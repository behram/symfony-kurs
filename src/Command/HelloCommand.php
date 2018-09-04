<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:hello')
            ->setDescription('Size güzel bir merhaba mesajı verir!')
            ->setHelp('php bin/console app:help veya a:h şeklinde çalıştırılabilir.')
            ->addArgument('name', InputArgument::REQUIRED, 'Kime selam vermemi istersin?')
            ->addArgument('soyad', InputArgument::OPTIONAL, 'Hangi soyad?')
            ->addOption('yas', 'y', InputOption::VALUE_REQUIRED, 'Yaşınızı Öğrenebilir miyim?', 87)
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $surname = $input->getArgument('soyad');
        if(!empty($surname)){
            $name = $name. ' '.$surname;
        }
        $yas = $input->getOption('yas');

        $output->writeln('Merhaba Güzel İnsan '.$name);

        $output->writeln(printf('Yasiniz %s sanirim ;)', $yas));
    }
}