<?php

    use App\Domain;
    use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = ["https://api.tfl.gov.uk/", " https://api.tfl.gov.uk/StopPoint/Search?query="];

        foreach ($domains as $domain) {
            Domain::create(["domain" => $domain]);
        }
    }
}
