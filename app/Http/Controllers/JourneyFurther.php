<?php

/**
 * This class handles the requests from Alexa - there's a separate method for each Intent that we've
 * defined within $root/_alexa-configuration/intent-schema.json
 *
 * For flexability, the speach strings we return are defined in $root/config/JourneyFurther.php ; In
 * there we also define the list of words we recognise for defining terms, and which responses to map
 * them to.
 *
 * Within each Intent method, we also post what was requested into the JourneyFurther Slack channel -
 * the webhook is defined in $root/config/slack.php
 *
 * @author Rick Harrison.
 */

namespace App\Http\Controllers;

/* Laravel core includes */
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/* Bespoke slack-posting class include */
use App\Slack;

/* Alexa includes from compser package Develpr/AlexaApp */
use Alexa;
use Develpr\AlexaApp\Response\AlexaResponse;
use Develpr\AlexaApp\Response\Speech;
use Develpr\AlexaApp\Response\SSML;
use Develpr\AlexaApp\Response\Card;
use Develpr\AlexaApp\Response\Reprompt;

/**
 * Class JourneyFurther
 * Controller for JourneyFurther's Alexa-based routing end-points ("Intents").
 * @package App\Http\Controllers
 */
class JourneyFurther extends Controller
{

    /**
     * Invoked if someone says "Alexa, [Launch|Start] Journey Further.
     * @return AlexaResponse
     */
    public function launch()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: Launch/Start Journey Further"
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.Launch.say").'</speak>'));
        $alexaResponse->withCard(new Card("Journey Further Skill started", "",Config::get("journeyfurther.Responses.Launch.read")));
        // as this is a start/open command, we tell alexa to listen for the user to say something else (we prompt
        // the user to say something as part of the response message.
        $alexaResponse->endSession(false);

        return $alexaResponse;
    }


    /**
     * Intent called if someone asks alexa to stop/cancel (would expect this one to be called after someone
     * has used the open/start command.
     * @return AlexaResponse
     */
    public function stopIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "A user asked alexa to Stop."
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.Stop.say").'</speak>'));
        // in theory if i should need to explicityly end the session, as it ends unless i say otherwise, but
        // lets be really explicit to make it clear in the code.
        $alexaResponse->endSession(true);

        return $alexaResponse;

    }


    /**
     * Invoked when people ask who Journey Further are
     * @return AlexaResponse
     */
    public function aboutJourneyFurtherIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: who are Journey Further?"
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.AboutJourneyFurther.say").'</speak>'));
        $alexaResponse->withCard(new Card("About Journey Further", "", Config::get("journeyfurther.Responses.AboutJourneyFurther.read")));

        return $alexaResponse;
    }


    /**
     * Invoked when people ask why they were sent an Echo by Journey Further.
     * @return AlexaResponse
     */
    public function whySentAnEchoIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: why was i sent this echo?"
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.WhySentAnEcho.say").'</speak>'));
        $alexaResponse->withCard(new Card("Why have Journey Further sent me an Echo?", "", Config::get("journeyfurther.Responses.WhySentAnEcho.read")));

        return $alexaResponse;
    }


    /**
     * Invoked when asking what skills/requests the Journey Further app can handle.
     * @return AlexaResponse
     */
    public function whatSkillsIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: what skills do you have?"
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.WhatSkills.say").'</speak>'));
        $alexaResponse->withCard(new Card("What skills does Journey Further offer?", "", Config::get("journeyfurther.Responses.WhatSkills.read")));

        return $alexaResponse;
    }


    /**
     * Invoked if someone asks how to contact Journey Further.
     * @return AlexaResponse
     */
    public function contactIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: how do i contact you?"
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.Contact.say").'</speak>'));
        $alexaResponse->withCard(new Card("Contacting Journey Further", "", Config::get("journeyfurther.Responses.Contact.read")));

        return $alexaResponse;
    }


    /**
     * Intent to give a response if someone asks for Help.
     * @return AlexaResponse
     */
    public function helpIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "A user asked for Help."
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.Help.say").'</speak>'));
        $alexaResponse->withCard(new Card("Help", "", Config::get("journeyfurther.Responses.Help.read")));
        // with the help intent we prompt the user to ask us something, so tell alexa to listen for a reply.
        $alexaResponse->endSession(false);

        return $alexaResponse;

    }


    /**
     * Invoked when asked to define a specific term. Expects an Alexa slot for the term, and we use the
     * JourneyFurther config item "journeyfurther.Terms2Response" to work out which response to map the term
     * to (this is because we can define multiple terms to actually mean the same thing, so they share one
     * response).
     * @return AlexaResponse
     */
    public function defineTermsIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: what is '".Alexa::slot('term')."'?"
            ],
            'echo-contact-request'
        );

        // lets make the term lowercase to make it easier to look-up
        $term = strtolower(Alexa::slot('term'));

        // check if it's a term we recognise
        if (array_key_exists($term, Config::get("journeyfurther.Terms2Response"))) {

            // we have a response set up for this term.
            $responseCode = Config::get("journeyfurther.Terms2Response")[$term];
            $alexaResponse = new AlexaResponse;
            $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.DefineTerms.".$responseCode.".say").'</speak>'));
            $alexaResponse->withCard(new Card("Define " . $responseCode, "", Config::get("journeyfurther.Responses.DefineTerms.".$responseCode.".read")));
        } else {
            // we dont have a response set up for this term, therefore bail with an unknown term message.
            $alexaResponse = new AlexaResponse;
            $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.DefineTerms.Unknown.say").'</speak>'));
            $alexaResponse->withCard(new Card("Unknown term: " . Alexa::slot('term'), "", Config::get("journeyfurther.Responses.DefineTerms.Unknown.read")));
        }
        return $alexaResponse;
    }


    /**
     * Invoked when asked to compare 2 specific terms. Expects 2 Alexa slots for the terms, and we use the
     * JourneyFurther config item "journeyfurther.Terms2Response" to work out which response to map the term
     * to (this is because we can define multiple terms to actually mean the same thing, so they share one
     * response).
     * For the purpose of comparing, we just read out the term definitions for both terms one after the other.
     * @return AlexaResponse
     */
    public function compareTermsIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo user asked: compare '".Alexa::slot('firstterm')."' with '".Alexa::slot('secondterm')."'"
            ],'echo-contact-request'
        );

        // lowercase the terms to make easier to compare.
        $term1 = strtolower(Alexa::slot('firstterm'));
        $term2 = strtolower(Alexa::slot('secondterm'));

        $term1Response = '';
        $term2Response = '';

        // see if we recognise term 1:
        if (array_key_exists($term1, Config::get("journeyfurther.Terms2Response"))) {
            $responseCode = Config::get("journeyfurther.Terms2Response")[$term1];
            $term1Response = Config::get("journeyfurther.Responses.DefineTerms.".$responseCode);
        }
        // see if we recognise term 2:
        if (array_key_exists($term2, Config::get("journeyfurther.Terms2Response"))) {
            $responseCode = Config::get("journeyfurther.Terms2Response")[$term2];
            $term2Response = Config::get("journeyfurther.Responses.DefineTerms.".$responseCode);
        }
        // If either term 1 or term 2 are undefined, give an error message.
        if($term1Response == '' || $term2Response == '') {
            $alexaResponse = new AlexaResponse;
            $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.DefineTerms.Unknown.say").'</speak>'));
            $alexaResponse->withCard(new Card("Unknown term: " . Alexa::slot('term'), "", Config::get("journeyfurther.Responses.DefineTerms.Unknown.read")));
        }
        else {
            // both terms were defined, therefore read out the definition of term1 forllowed by term2.
            $alexaResponse = new AlexaResponse;
            $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.$term1Response["say"]." ".$term2Response["say"].'</speak>'));
            $alexaResponse->withCard(new Card("Compare " . Alexa::slot('firstterm'). " with ". Alexa::slot('secondterm'), "", $term1Response["read"]." ".$term2Response["read"]));
        }
        return $alexaResponse;
    }


    /**
     * IGNORE THIS - As an experiment i tried defining a dummy intent first in the list of intents that we
     * wouldnt expect to be called - we were experimenting to see if there was a command alexa didnt understand
     * if it was just picking the first intent or trying to guess the most likely intent (it seems not particularly
     * accurate in picking an intent when it doesnt know - thru testing we ruled out that it would pick the first
     * intent - it is trying to work out what you're asking and guessing, it's not making very good guesses -
     * we'll probably remove this intent later.
     * @return AlexaResponse
     */
    public function dontUnderstandIntent()
    {
        // Post to the JourneyFurther slack channel
        Slack::postMessageWithAttachments(
            config('slack.default_channel'),
            [
                "color" => "good",
                "title" => "Echo command",
                "text" => "An echo request wasn't understood so the general i-dont-understand response was given :-("
            ],
            'echo-contact-request'
        );

        // deal with sending the response to alexa.
        $alexaResponse = new AlexaResponse;
        $alexaResponse->withSpeech((new SSML())->setValue('<speak>'.Config::get("journeyfurther.Responses.DontUnderstand.say").'</speak>'));
        // there's no card response for this one - figure a text copy saying "i dont understand" would be redundant.

        return $alexaResponse;
    }


}
