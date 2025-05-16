<?php

namespace NormanHuth\Installer\Console;

use Laravel\Installer\Console\NewCommand as Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\confirm;

#[AsCommand(name: 'new')]
class NewCommand extends Command
{
    /**
     * Ensure that the required PHP extensions are installed.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     *
     * @throws \RuntimeException
     */
    #[\Override]
    protected function ensureExtensionsAreAvailable(InputInterface $input, OutputInterface $output): void
    {
        parent::ensureExtensionsAreAvailable($input, $output);

        if (
            ! $this->usingStarterKit($input) &&
            confirm(':) Would you like to use norman-huth/laravel-starter-kit?')
        ) {
            $input->setOption('using', 'norman-huth/laravel-starter-kit');
        }
    }
}
