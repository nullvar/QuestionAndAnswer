<?php

declare(strict_types=1);

namespace App\Presentation\Console\Question\Answer;

use App\Presentation\Common\Question\Answer\Command\CreateAnswerCommand;
use App\Question\Application\Answer\CommandService\AnswerCommandService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAnswerConsoleCommand extends Command
{
    private AnswerCommandService $answerCommandService;

    public function __construct(AnswerCommandService $answerCommandService)
    {
        $this->answerCommandService = $answerCommandService;
        parent::__construct('app:answer:create');
    }

    public function configure()
    {
        $this
            ->setDescription('Create a new answer')
            ->setHelp('This command allows you create a answer')
            ->addArgument('content', InputArgument::REQUIRED, 'Content')
            ->addArgument('belongsTo', InputArgument::REQUIRED, 'A Question Id')
            ->addArgument('authorId', InputArgument::REQUIRED, 'A Author Id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var string $content */
        $content = $input->getArgument('content');

        /** @var string $belongsTo */
        $belongsTo = $input->getArgument('belongsTo');

        /** @var string $authorId */
        $authorId = $input->getArgument('authorId');

        $answerId = $this->answerCommandService->createAnswer(
            new CreateAnswerCommand(
                $content,
                $belongsTo,
                $authorId
            )
        );

        $output->writeln('Answer id: ' . $answerId);

        return Command::SUCCESS;
    }
}