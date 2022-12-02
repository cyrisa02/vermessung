<?php

namespace App\Tests\Functional;

use App\Entity\Provider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChildTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        // Get the urlgenerator
        $urlGenerator = $client->getContainer()->get('router');

        // Get entity manager, 3=provider

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(Provider::class, 3);

        $client->loginUser($user);

        
        $crawler = $client->request(Request::METHOD_GET, $urlGenerator->generate('app_provider_new') );

        // the form
        $form = $crawler->filter("form[name=registration_form_type_provider]")->form([
            'registration_form_type_provider[email]' => "johndoe@gmail.com",
            'registration_form_type_provider[lastname]' => "Doe",
            'registration_form_type_provider[firstname]' => "John ",            
            'registration_form_type_provider[address]' => "27 rue des Lilas",
            'registration_form_type_provider[zipcode]' => "02200",
            'registration_form_type_provider[city]' => "Soissons",            
            'registration_form_type_provider[phone]' => "067777",
            'registration_form_type_child[company]' => "Handwerker GmbH",
             'registration_form_type_child[description]' => "Description",
            
        ]);
        $client->submit($form);

        //redirection

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $client->followRedirect();

        // alert box
        $this->assertSelectorTextContains('div.alert-success', 'Die Änderung wurde erfolgreich abgeschlossen');

        $this->assertRouteSame('app_providermob_index');

               
    }

    public function testIfListProvidersSuccessfull(): void
    {
        $client = static::createClient();

        // Get the urlgenerator
        $urlGenerator = $client->getContainer()->get('router');

        // Get entity manager,  3=provider

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(Provider::class, 3);

        $client->loginUser($user);

        
        $crawler = $client->request(Request::METHOD_GET, $urlGenerator->generate('app_providermob_index') );

        $this->assertResponseIsSuccessful();

        $this->assertRouteSame('app_providermob_index');
    }

    public function testIfUpdateAProviderIsSuccessfull(): void
    {
        $client = static::createClient();
        
        $urlGenerator = $client->getContainer()->get('router');

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(Provider::class, 3);
        
        $client->loginUser($user);
        
        $crawler = $client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_provider_edit', [7])
        );

     
        $this->assertResponseIsSuccessful();

        $form = $crawler->filter('form[name=child]')->form([
            
            'child[zipcode]'=>"02180",
           
        ]);

        $client->submit($form);

        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $client->followRedirect();

        // alert box
        $this->assertSelectorTextContains('div.alert-success', 'Die Änderung wurde erfolgreich abgeschlossen');

        $this->assertRouteSame('app_providermob_index');
    }

    public function testIfDeleteAProviderIsSuccessfull(): void

    {
        $client = static::createClient();
        
        $urlGenerator = $client->getContainer()->get('router');

        $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

        $user = $entityManager->find(Provider::class, 3);
        

        $client->loginUser($user);
        
        $crawler = $client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_provider_delete', [3])
        );     
       
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);

        $client->followRedirect();

        // alert box
        $this->assertSelectorTextContains('div.alert-success', 'Votre demande a été supprimée avec succès');

        $this->assertRouteSame('app_providermob_index');

    }
}