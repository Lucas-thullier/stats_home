<?php

namespace App\Http\Controllers;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScraperController extends Controller
{
    public function scrapeArtists()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(
            "https://fr.wikipedia.org/wiki/Cat%C3%A9gorie:Rappeur_fran%C3%A7ais"
        );

        $rawContent = $response->getBody()->getContents();

        $domContent = new DOMDocument("1.0", "utf8");
        @$domContent->loadHTML($rawContent);

        $xpath = new \DOMXpath($domContent);
        $rawGroups = $xpath->query(
            "//div[contains(@class,'mw-category-group')]/ul/li"
        );

        $allRappeurs = [];
        foreach ($rawGroups as $rawRappeur) {
            $rawRappeur = $rawRappeur->textContent;
            $rappeur = preg_replace("#\(.+\)#", "", $rawRappeur);
            $rappeur = trim($rappeur);
            $allRappeurs[] = $rappeur;
        }

        $allRappeurs = json_encode($allRappeurs);
        Storage::put("public/rappeurs.json", $allRappeurs);
        dd($allRappeurs);
        // dd($rawArtists);
    }

    public function getRappeurByGenius()
    {
        $authentication = new \Http\Message\Authentication\Bearer(
            env("GENIUS_API_KEY")
        );

        $genius = new \Genius\Genius($authentication);
        $upvoteAnnotation = $genius->getArtistsResource("2syl");
        dd($upvoteAnnotation);
    }
}
