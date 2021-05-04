<?php

declare(strict_types=1);

namespace App\Presentation\Console\Question\Tag;

use App\Presentation\Common\Question\Tag\CreatedTagCommand;
use App\Question\Application\Tag\CommandService\TagCommandService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTagConsoleCommand extends Command
{
    private TagCommandService $tagCommandService;

    public function __construct(TagCommandService $tagCommandService)
    {
        $this->tagCommandService = $tagCommandService;

        parent::__construct('app:tag:create');
    }

    public function configure(): void
    {
        $this
            ->setDescription('Create a new tag')
            ->setHelp('This command allows created a tag')
            ->addArgument('tag', InputArgument::REQUIRED, 'Tag')
            ->addArgument('description', InputArgument::REQUIRED, 'Description')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var string $tag */
        $tag = $input->getArgument('tag');

        /** @var string $description */
        $description = $input->getArgument('description');

        $tagId = $this->tagCommandService->createTag(
            new CreatedTagCommand(
                $tag,
                $description
            )
        );

        $output->writeln('Tag id: ' . $tagId);

        return Command::SUCCESS;
    }
}