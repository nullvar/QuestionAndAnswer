<?php

declare(strict_types=1);

namespace App\Presentation\Console\Core\User;

use App\Core\Application\User\CommandService\UserCommandService;
use App\Presentation\Common\Core\User\Command\CreateUserCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateUserConsoleCommand extends Command
{
    private UserCommandService $userCommandService;

    public function __construct(
        UserCommandService $userCommandService
    ) {
        $this->userCommandService = $userCommandService;

        parent::__construct('app:user:create');
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create a new user')
            ->setHelp('This command allows you to create a user')
            ->addArgument('username', InputArgument::REQUIRED, 'Username')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $username */
        $username = $input->getArgument('username');

        /** @var string $password */
        $password = $input->getArgument('password');

        $userId = $this->userCommandService->createUser(
            new CreateUserCommand(
                $username,
                $password
            )
        );

        $output->writeln('User id: ' . $userId);

        return Command::SUCCESS;
    }
}