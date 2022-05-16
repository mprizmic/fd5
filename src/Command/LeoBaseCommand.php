<?php

/*
 * lee los establecimientos del repositorio y muestra los apodos por pantalla
 * tambien los guarda en un log
 * 
 */

namespace App\Command;

use App\Entity\Establecimiento;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LeoBaseCommand extends Command {

    protected static $defaultName = 'app:leo-base';
    protected static $defaultDescription = 'prueba de acceso a datos. Tomado de MigrarLocalización de fd5.local';
    private $em;
    private $logger;

    public function __construct(EntityManagerInterface $em, LoggerInterface $logger) {
        parent::__construct();
        $this->em = $em;
        $this->logger = $logger;
    }

    protected function configure(): void {
        $this
                ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
                ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {

        $estas = $this->em->getRepository('App:Establecimiento')->findAllOrdenado();
        // también funciona con  'App\Entity\Establecimiento'

        foreach ($estas as $esta) {
            $mensaje = 'Establecimiento: ' . $esta->getApodo();
            $output->writeln('**********************************************');
            $output->writeln($mensaje);
            $this->logger->info($mensaje);
        }
//        //salida de pantalla
        $output->writeln('//////////////////////////////////////////////');
        $output->writeln('//////////////////////////////////////////////');
        $output->writeln('Proceso todo');

        return Command::SUCCESS;
    }

}
