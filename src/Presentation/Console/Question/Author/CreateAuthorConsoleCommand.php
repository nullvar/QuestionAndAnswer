<?php

declare(strict_types=1);

namespace App\Presentation\Console\Question\Author;

use App\Presentation\Common\Question\Author\Command\CreateAuthorCommand;
use App\Question\Application\Author\CommandService\AuthorCommandService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAuthorConsoleCommand extends Command
{
    private AuthorCommandService $authorCommandService;

    public function __construct(
        AuthorCommandService $authorCommandService
    ) {
        $this->authorCommandService = $authorCommandService;

        parent::__construct('app:author:create');
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Create a new author')
            ->setHelp('This command allows you create a author')
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

        $authorId = $this->authorCommandService->createauthor(
            new CreateAuthorCommand(
                $name,
                $userId
            )
        );

        $output->writeln('Author id: ' . $authorId);

        return Command::SUCCESS;
    }
}