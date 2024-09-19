<?php
// src/Command/ImportGamesCommand.php

namespace App\Command;

use App\Service\IGDBService;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Game;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ImportGamesCommand extends Command
{
    protected static $defaultName = 'app:import-games';
    private $igdbService;
    private $entityManager;

    public function __construct(IGDBService $igdbService, EntityManagerInterface $entityManager)
    {
        $this->igdbService = $igdbService;
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Import games from IGDB API and populate the database')
            ->addArgument('search', InputArgument::REQUIRED, 'The search term for the games');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $searchTerm = $input->getArgument('search');
        $gamesData = $this->igdbService->getGames($searchTerm);

        foreach ($gamesData as $gameData) {
            $game = new Game();
            $game->setName($gameData['name']);
            $game->setSummary($gameData['summary'] ?? '');
            // Map other fields like release dates, platforms, etc.

            $this->entityManager->persist($game);
        }

        $this->entityManager->flush();

        $output->writeln('Games imported successfully!');

        return Command::SUCCESS;
    }
}
