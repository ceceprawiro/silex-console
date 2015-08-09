<?php

namespace Classes\Console;

use Knp\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Classes\Console\Console;
use Classes\Utils\Timing;

/**
 * Faking command
 *
 * @extends Knp\Command\Command
 * @author  Indra Ginn <indra.ginn@gmail.com>
 */
class FakingCommand extends Command
{
    protected function configure()
    {
        $config = Console::getConfig(Console::PLACEHOLDER);

        $this->interval = $config['interval'] ? $config['interval'] : Console::DEFAULT_INTERVAL;

        $this
            ->setName($config['name'])
            ->setDescription($config['description'])
            ->addOption(
               'debug',
               null,
               InputOption::VALUE_NONE,
               'If set, the task will run in debug mode'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getSilexApplication();
        $output->writeln("<info>Faking is in da house</info>");
    }
}
