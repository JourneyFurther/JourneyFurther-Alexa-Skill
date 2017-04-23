## Journey Further Alexa Skill

This is a custom Amazon Alexa skill for Journey Further.
It can use used to explain who Journey Further are, and define
what common acronymns are.

## Framework

The skill is built ontop of the Laravel PHP framework (v5.4), and uses a
3rd party laravel package for more easily interfacing with 
Alexa ( the fabulous https://github.com/develpr/alexa-app by Kevin Mitchell, installed via Composer)

To Install/Run this app, you will need a web server running at least PHP5.6, 
and you'll need to have application files outside of the web root directory
(ie you'll need reasonable control over your webserver configuration - we're running it 
on a virtual server from www.digitalocean.com)

## Installation

Clone this Repo to your webserver, your apache/nginx web-root needs
to point to the "public" folder within this project.

Once the files are in place, you'll need to use composer to install
the 3rd party packages ignored in this repository.

You can get composer from: https://getcomposer.org/

then run from the root of this project:
`Composer Install`

You'll then need to configure your skill at `https://developer.amazon.com`, 
it will ask you for a json intent-schema, sample utterances, and a custom slot,
the content for these can be found in the `_alexa-configuration` folder.
(obviously, you'll need to point your new skill to the web address
you've set up for this app on your hosting)

## Code locations
The main stuff we've added are in:
* `routes/api.php` - url routing for what the alexa service is calling
* `app/Http/Controllers/JourneyFurther.php` - controller class for the code that gets executed for each of the url routes, theres a separate method for each Intent.
* `config/journeyfurther.php` - config file defining the strings of speach we're returning to the alexa service, called from the controller.
* `config/slack.php` - if you're hooking this up to post into a slack channel, you'll need to define your api webhook in here.
* `config/alexa.php` - this is the standard config file installed with the `develpr/alexa-app` package, but you might want to have a browse of it to see what config settings you have at your disposal.

## Light overview

This is quite a simple alexa skill, for the most part all that happens for a given question is we return a pre-determined response.
So we have an Intent (within the Controller) for each type of question we expect, and it
returns the relevant response found in `config/journeyfurther.php`.

It gets a little more fruity when defining terms, as we use alexa "slots" - you tell alexa (on the amazon developer site when setting up your skill), where a
"slot" is within a given sample utterance, and to help it out you provide a list of words you expect to be spoken 
within that slot. When you invoke the defineTerm or compareTerms intents, we use a lookup of terms-to-response 
(defined within `config/journeyfurther.php`) to work out which response to give for a given term 
(we use a lookup of terms-to-responses, as we want to have things like "PPC" and "Pay Per Click" give the same response as they're
the same thing)

## Credits

Author: Rick Harrison / Journey Further.

www.journeyfurther.com   ;   @JourneyFurther
