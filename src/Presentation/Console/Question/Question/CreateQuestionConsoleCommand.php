<?php

declare(strict_types=1);

namespace App\Presentation\Console\Question\Question;

use App\Presentation\Common\Question\Question\Command\CreateQuestionCommand;
use App\Question\Application\Question\CommandService\QuestionCommandService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateQuestionConsoleCommand extends Command
{
    private QuestionCommandService $questionCommandService;

    public function __construct(
        QuestionCommandService $questionCommandService
    ) {
        $this->questionCommandService = $questionCommandService;

        parent::__construct('app:question:create');
    }

    public function configure(): void
    {
        $this
            ->setDescription('Create a new question')
            ->setHelp('This command allows you create a question')
            ->addArgument('title', InputArgument::REQUIRED, 'Title')
            ->addArgument('content', InputArgument::REQUIRED, 'Content')
            ->addArgument('authorId', InputArgument::REQUIRED, 'Create by author id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var string $title */
        $title = $input->getArgument('title');

        /** @var string $content */
        $content = $input->getArgument('content');

        /** @var string $authorId */
        $authorId = $input->getArgument('authorId');

        $questionId = $this->questionCommandService->createQuestion(
            new CreateQuestionCommand(
                $title,
                $content,
                $authorId
            )
        );

        $output->writeln('Question id: ' . $questionId);

        return Command::SUCCESS;
    }
}