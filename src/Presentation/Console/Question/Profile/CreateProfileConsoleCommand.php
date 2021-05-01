<?php

declare(strict_types=1);

namespace App\Presentation\Console\Question\Profile;

use App\Presentation\Common\Question\Profile\Command\CreateProfileCommand;
use App\Question\Application\Profile\CommandService\ProfileCommandService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProfileConsoleCommand extends Command
{
    private ProfileCommandService $profileCommandService;

    public function __construct(
        ProfileCommandService $profileCommandService
    ) {
        $this->profileCommandService = $profileCommandService;

        parent::__construct('app:profile:create');
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create a new profile')
            ->setHelp('This command allows you create a profile')
            ->addArgument('name', InputArgument::REQUIRED, 'Name')
            ->addArgument('userId', InputArgument::REQUIRED, 'User id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $name */
        $name = $input->getArgument('name');

        /** @var string $userId */
        $userId = $input->getArgument('userId');

        $profileId = $this->profileCommandService->createProfile(
            new CreateProfileCommand(
                $name,
                $userId
            )
        );

        $output->writeln('Profile id: ' . $profileId);

        return Command::SUCCESS;
    }
}