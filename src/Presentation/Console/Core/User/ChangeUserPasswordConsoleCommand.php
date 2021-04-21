<?php

declare(strict_types=1);

namespace App\Presentation\Console\Core\User;

use App\Core\Application\User\CommandService\UserCommandService;
use App\Presentation\Common\Core\User\Commands\ChangeUserPasswordCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ChangeUserPasswordConsoleCommand extends Command
{
    private UserCommandService $userCommandService;

    public function __construct(
        UserCommandService $userCommandService
    ) {
        $this->userCommandService = $userCommandService;

        parent::__construct('app:user:change_password');
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create a new user')
            ->setHelp('This command allows you to create a user')
            ->addArgument('id', InputArgument::REQUIRED, 'User id')
            ->addArgument('password', InputArgument::REQUIRED, 'New user password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $id */
        $id = $input->getArgument('id');

        /** @var string $password */
        $password = $input->getArgument('password');

        $this->userCommandService->changePassword(
            new ChangeUserPasswordCommand(
                $id,
                $password
            )
        );

        return Command::SUCCESS;
    }
}