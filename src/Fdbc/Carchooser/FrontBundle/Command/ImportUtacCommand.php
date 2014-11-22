<?php

namespace Fdbc\Carchooser\FrontBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Fdbc\Carchooser\FrontBundle\Entity\Brand;
use Fdbc\Carchooser\FrontBundle\Entity\Model;
use Fdbc\Carchooser\FrontBundle\Entity\Version;
use Fdbc\Carchooser\FrontBundle\Entity\Energy;
use Fdbc\Carchooser\FrontBundle\Entity\Type;

// app/console import:utac /var/www/carChooser/src/Fdbc/Carchooser/FrontBundle/Command/test.csv
class ImportUtacCommand extends ContainerAwareCommand
{
    private $em;
    private $doctrine;
    private $map;

    protected function configure()
    {
        $this
            ->setName('import:utac')
            ->setDescription('Import UTAC')
            ->addArgument('filename', InputArgument::REQUIRED, 'Name of the file to import')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->doctrine = $this->getContainer()->get('doctrine');

        // map column label and key
        $this->map = array(
            'Marque' => 0,
            'Modèle dossier' => 1,
            'Modèle UTAC' => 2,
            'Désignation commerciale' => 3,
            'CNIT' => 4,
            'Type Variante Version (TVV)' => 5,
            'Carburant' => 6,
            'Hybride' => 7,
            'Puissance administrative' => 8,
            'Puissance maximale (kW)' => 9,
            'Boîte de vitesse' => 10,
            'Consommation urbaine (l/100km)' => 11,
            'Consommation extra-urbaine (l/100km)' => 12,
            'Consommation mixte (l/100km)' => 13,
            'CO2 (g/km)' => 14,
            'CO type I (g/km)' => 15,
            'HC (g/km)' => 16,
            'NOX (g/km)' => 17,
            'HC+NOX (g/km)' => 18,
            'Particules (g/km)' => 19,
            'Masse vide euro min (kg)' => 20,
            'Masse vide euro max (kg)' => 21,
            'Champ V9' => 22,
            'Date de mise à jour' => 23,
            'Carrosserie' => 24,
            'Gamme' => 25,
         );

        $filename = $input->getArgument('filename');

        $i = 0;
        $batchSize = 100;

        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 10000, ";")) !== FALSE) {
                // don't import header
                if ($i === 0) {
                    $i++;
                    continue;
                }

                // Brand
                $brand = $this->setBrandName($row[$this->map['Marque']]);

                // Model
                $model = $this->setModel($row[$this->map['Modèle UTAC']], $brand);

                // Version
                $this->setVersion($row, $model);

                $this->em->flush();
                $this->em->clear(); // Detaches all objects from Doctrine!
                

                $i++;
            }
            fclose($handle);
        }

        $this->em->flush(); // Persist objects that did not make up an entire batch
        $this->em->clear();

        $output->writeln('Import done');
    }

    private function setBrandName($brandName)
    {
        $brand = $this->doctrine
                    ->getRepository('FdbcCarchooserFrontBundle:Brand')
                    ->findOneByName($brandName);
        if ($brand == null) {
            $brand = new Brand();
            $brand->setName($brandName);
            $this->em->persist($brand);
        }
        return $brand;
    }

    private function setModel($modelName, $brand)
    {
        $model = $this->doctrine
                    ->getRepository('FdbcCarchooserFrontBundle:Model')
                    ->findOneByName($modelName);

        if ($model == null) {
            $model = new Model();
            $model->setName($modelName);
            $model->setBrand($brand);
            $this->em->persist($model);
        }

        return $model;
    }

    private function setVersion($row, $model)
    {
        $row[$this->map['Modèle UTAC']];

        $version = $this->doctrine
                    ->getRepository('FdbcCarchooserFrontBundle:Version')
                    ->findOneByName($row[$this->map['Désignation commerciale']]);

        if ($version == null) {
            $version = new Version();
            $version->setName($row[$this->map['Désignation commerciale']]);

            // Energy
            $energy = $this->doctrine
                    ->getRepository('FdbcCarchooserFrontBundle:Energy')
                    ->findOneByK($row[$this->map['Carburant']]);
            if ($energy == null) {
                $energy = new Energy();
                $energy->setName($row[$this->map['Carburant']]);
                $energy->setK($row[$this->map['Carburant']]);
                $this->em->persist($energy);
            }

            $version->setEnergy($energy);

            // Type
            $type = $this->doctrine
                    ->getRepository('FdbcCarchooserFrontBundle:Type')
                    ->findOneByK($row[$this->map['Carrosserie']]);
            if ($type == null) {
                $type = new Type();
                $type->setName($row[$this->map['Carrosserie']]);
                $type->setK($row[$this->map['Carrosserie']]);
                $this->em->persist($type);
            }

            $version->setType($type);

            $version->setModel($model);
            $version->setPowerAdm($row[$this->map['Puissance administrative']]);
            $version->setPowerMax($row[$this->map['Puissance maximale (kW)']]);
            $version->setNbGear($row[$this->map['Boîte de vitesse']]);
            $version->setConsumptionCity($row[$this->map['Consommation urbaine (l/100km)']]);
            $version->setConsumptionExtra($row[$this->map['Consommation extra-urbaine (l/100km)']]);
            $version->setConsumption($row[$this->map['Consommation mixte (l/100km)']]);
            $version->setCo2($row[$this->map['CO2 (g/km)']]);
            $version->setCo($row[$this->map['CO type I (g/km)']]);
            $version->setHc($row[$this->map['HC (g/km)']]);
            $version->setNox($row[$this->map['NOX (g/km)']]);
            $version->setParticule($row[$this->map['Particules (g/km)']]);
            $version->setWeight($row[$this->map['Masse vide euro min (kg)']]);

            $this->em->persist($version);
        }

        return $version;
    }
}
