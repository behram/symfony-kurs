<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SymfonyStyleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:symfony:style')
            ->setDescription('Size güzel bir output verir!')
            ->setHelp('php bin/console app:symfony:style veya a:s:s şeklinde çalıştırılabilir.')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        // title
        $io->title('Mükemmel Title');

        // section
        $io->section('Mükemmel Section');

        // text
        $io->text('Merhaba bu içerik');

        // text array
        $io->text([
            'Merhaba gündüz',
            'Merhaba bu içerik',
            'Merhaba bu içerik'
        ]);

        // listing
        $io->listing([
            'Item 1',
            'Item 2',
            'Item 3',
        ]);

        // table
        $io->table(
            ['Ad', 'Soyad'],
            [
                ['Behram', 'Celen'],
                ['Selim', 'Yildiz'],
                ['Harun', 'Güleç'],
                ['Tuna', 'Yeniçeri'],
            ]
        );
        $io->newLine(2);

        // note
        $io->note('Türkiye benim güzel ülkem!');

        // caution
        $io->caution('Biraz uyumanda fayda var!');

        // progress bar
        $io->progressStart(100);
        foreach (range(0,100) as $item){
            $io->progressAdvance(1);
            //sleep(1);
        }
        $io->progressFinish();

        // ask
        $renk = $io->ask('Hangi Rengi Seversin?');

        $io->writeln('En sevdiğin renk: '. $renk);

        // confirm
        $io->confirm('Tüm veritabanı silinsin mi?');

        // ask hidden
        $io->askHidden('Şifren Nedir?');

        // choice
        $io->choice('Favori sporların?', ['Futbol', 'Tenis', 'Masa Tenisi']);

        // success
        $io->success(['İşlem Başarılı', 'Mükemmel']);

        // warning
        $io->warning('Bu son uyarım!');

        // error
        $io->error('Bu hata bitirdi bizi!');
    }
}