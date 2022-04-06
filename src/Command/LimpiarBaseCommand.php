<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class LimpiarBaseCommand extends Command
{
    protected static $defaultName = 'app:limpiar_base';
    protected static $defaultDescription = 'Borrado de todos los registros de la base de datos';
    
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }
    protected function configure(): void
    {
        $this->setDescription('Esto borra todos los registros de la base de datos. Sirve para cuando tengo problemas para agregar una propiedad que tiene que ser nula pero la migración no lo permite.');     ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $tablas = ['unidad_educativa', 'aviso', 'establecimiento_edificio','establecimiento', 
        'vecino', 'domicilio', 'edificio', 'area', 'barrio', 'comuna', 'distrito_escolar', 'nivel', 
        'tipo_establecimiento', 'user'];

        foreach($tablas as $tabla){
            $RAW_QUERY = "delete from " . $tabla;
            $conn = $this->em->getConnection();
            $conn->executeQuery($RAW_QUERY);
            $output->writeln('Borró ' . $tabla);
        };
        $output->writeln('ok');
    
        //$io->success('You have a new command! Now make it your own! Pass --help to see your options.');
        
        $output->writeln('**************************************');
        $output->writeln('Fin');
        $output->writeln('**************************************');
        
        return Command::SUCCESS;
    }
}
