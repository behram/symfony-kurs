<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:hello')
            ->setDescription('Size güzel bir merhaba mesajı verir!')
            ->setHelp('php bin/console app:help veya a:h şeklinde çalıştırılabilir.')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Merhaba Güzel İnsan!');
    }
}