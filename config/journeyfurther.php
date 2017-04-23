<?php

/**
 * Response strings to the questions the Journey Further Alexa app can understand.
 *
 * As the project expands, these may end up in a database instead, or be restructured, for now the
 * questions and answers are pretty straight forwards.
 *
 * Each response is split between what to make Alexa say, and what to display in the Alexa companion app,
 * they're separate as the "say" version has hints for alexa on how to pronounce things more natually, or
 * miss-spellings to make her say things in a more natural way. Where we need her to spell out an
 * acronym, we use special SSML markup to tell alexa to spell the item, in one of two instances, she
 * spells it out a little strangely, so i get her to say things through trickery - eg B.B.C. could be
 * read as "Bee Bee Sea".
 *
 * Further down this file you see "Terms2Response defined - its a lookup for working out which term
 * definition to read out for whatever term the user supplied (means we can give the same response for
 * "PPC" as "Pay Per Click" etc.
 *
 * @author Rick Harrison.
*/

return [

    'Responses' => [
        'Launch' => [
            'say' => 'Hello, welcome to the Journey Further Alexa Skill, why not start by asking me who Journey Further are?',
            'read' => '"Hello, welcome to the Journey Further Alexa Skill, why not start by asking me who Journey Further are?',
        ],
        'Stop' => [
            'say' => 'Okay, your Journey Further session has ended. You can still ask it questions by saying "Alexa, ask Journey Further" before your question, or by starting the Journey Further skill again.',
        ],

        'AboutJourneyFurther' => [
            'say' => 'Journey Further is a biddable media agency, which exists to deliver clarity at speed. Voice searches make up twenty percent of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients.',
            'read' => 'Journey Further is a biddable media agency, which exists to deliver clarity at speed. Voice searches make up 20% of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients.',
        ],


        'WhySentAnEcho' => [
            'say' => 'Voice searches make up twenty percent of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients.',
            'read' => 'Voice searches make up 20% of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients.',
        ],

        'WhatSkills' => [
            'say' => 'I can explain what <say-as interpret-as="spell-out">PPC</say-as> and programmatic display are all about. You can ask me to explain what acronyms like <say-as interpret-as="spell-out">DSP</say-as>, <say-as interpret-as="spell-out">DCO</say-as>, and <say-as interpret-as="spell-out">SSP</say-as> mean two.',
            'read' => 'I can explain what PPC, and programmatic display are all about. You can ask me to explain what acronyms like DSP, DCO, and SSP mean too.',
        ],

        'DefineTerms' => [
            'PPC' => [
                'say' => '<say-as interpret-as="spell-out">PPC</say-as> stands for pay-per-click, a model of online advertising in which advertisers pay an ammount each time one of their ads are clicked. But we\'re guessing you already knew that? Try asking me about programmatic.',
                'read' => 'PPC stands for pay-per-click, a model of online advertising in which advertisers pay an amount each time one of their ads is clicked. But we\'re guessing you already knew that? Try asking me about programmatic.',
            ],
            'programmatic' => [
                'say' => 'Programmatic typically refers to the use of software to automate the purchase of digital advertising. It\'s a little more complicated and involves lots of acronyms. Try asking me to define <say-as interpret-as="spell-out">DSP</say-as>.',
                'read' => 'Programmatic typically refers to the use of software to automate the purchase of digital advertising. It\'s a little more complicated and involves lots of acronyms. Try asking me to define DSP.',
            ],
            'DSP' => [
                'say' => 'A demand-side platform enables advertisers and agencies to automate the purchase of display, video, mobile and search adds. A <say-as interpret-as="spell-out">DSP</say-as> assesses the attributes of every single add impression and can assign a bid based on those attributes. By removing rate negotiations and manual add insertion orders, the purchase of targeted advertising across a wide variety of publishers and platforms becomes quicker and more efficient.',
                'read' => '"A demand-side platform enables advertisers and agencies to automate the purchase of display, video, mobile and search ads. A DSP assesses the attributes of every single ad impression and can assign a bid based on those attributes. By removing rate negotiations and manual ad insertion orders, the purchase of targeted advertising across a variety of publishers and platforms becomes quicker and more efficient.',
            ],
            'SSP' => [
                'say' => 'A supply-side platform is software that enables publishers to automatically sell display, video, and mobile add impressions, maximising the price they can charge for these. An <say-as interpret-as="spell-out">SSP</say-as> allows publishers to access a large pool of potential buyers including add exchanges, networks and <say-as interpret-as="spell-out">DS</say-as>Peas in real time.',
                'read' => 'A supply-side platform is software that enables publishers to automatically sell display, video, and mobile ad impressions, maximising the price they can charge for these. A SSP allows publishers to access a large pool of potential buyers including ad exchanges, networks and DSPs in real time.',
            ],
            'DMP' => [
                'say' => 'A data management platform is a centralised platform used by agencies, publishers and marketers to manage and merge data such as cookie eye dees. A variety of data sources can be combined within the platform to generate audience segments for improved targeting.',
                'read' => 'A data management platform is a centralised platform used by agencies, publishers and marketers to manage and merge data such as cookie IDs. A variety of data sources can be combined within the platform to generate audience segments for improved targeting.',
            ],
            'RTB' => [
                'say' => 'Real time bidding enables the buying and selling of digital advertising through auctions which take place in a time frame of milliseconds – the time it takes for a web page to load. Auctions take place via media marketplaces such as add exchanges that connect buyers and sellers, and the price paid for impressions is based on immediate demand.',
                'read' => 'Real-time bidding enables the buying and selling of digital advertising through auctions which take place in a timeframe of milliseconds – the time it takes for a webpage to load. Auctions take place via media marketplaces such as ad exchanges that connect buyers and sellers, and the price paid for impressions is based on immediate demand.',
            ],
            'DCO' => [
                'say' => 'Dynamic creative optimisation allows marketers to create multiple versions of the same add from a single add tag, driving sophisticated targeting and optimisation. Add creative is broken down into individual elements and these are pieced together in real time to deliver the most relevant add to individual users.',
                'read' => 'Dynamic creative optimisation allows marketers to create multiple versions of the same ad from a single ad tag, driving sophisticated targeting and optimisation. Ad creative is broken down into individual elements and these are pieced together in real time to deliver the most relevant ad to individual users.',
            ],
            'WTF' => [
                'say' => 'Nice try.',
                'read' => 'Nice try.',
            ],
            'SEO' => [
                'say' => 'Search engine optimisation is the process of increasing traffic to a website by improving it\'s organic ranking and it\'s appearance in search results. <say-as interpret-as="spell-out">SEO</say-as> lacks the measurability that biddable media provides. Some might even say it is dying, and represents a bygone age in search marketing.',
                'read' => 'Search engine optimisation is the process of increasing traffic to a website by improving its organic ranking and appearance in search results. SEO lacks the measurability that biddable media provides - some might even say it is dying and represents a bygone age in search marketing.',
            ],
            'CRO' => [
                'say' => 'Conversion rate optimisation is the process of optimising a website to increase the likelihood that a user completes a desired action.',
                'read' => 'Conversion rate optimisation is the process of optimising a website to increase the likelihood that a user completes a desired action.',
            ],
            'Unknown' => [
                'say' => 'Sorry, i didn\'t recognise that term. I can explain for you what any of the following mean: <say-as interpret-as="spell-out">PPC</say-as>, Programmatic, <say-as interpret-as="spell-out">DSP</say-as>, <say-as interpret-as="spell-out">SSP</say-as>, <say-as interpret-as="spell-out">DMP</say-as>, <say-as interpret-as="spell-out">RTB</say-as>, and <say-as interpret-as="spell-out">DCO</say-as>.',
                'read' => 'Sorry, i didn\'t recognise that term. I can explain for you what any of the following mean: PPC, Programmatic, DSP, SSP, DMP, RTB, and DCO.',
            ],
        ],
        'Contact' => [
            'say' => 'Give us a call on 0113-3120-227 or send an e-mail to echo <break strength="medium" /> at <break strength="medium" /> journeyfurther.com',
            'read' => 'Give us a call on 0113 3120 227 or send an e-mail to echo@journeyfurther.com',
        ],
        'DontUnderstand' => [
            'say' => 'I’m sorry. I didn’t understand the question. Please try again.',
        ],
        'Help' => [
            'say' => 'Journey Further is a biddable media agency, which exists to deliver clarity at speed. Voice searches make up twenty percent of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients. Try asking this skill to define acronyms like <say-as interpret-as="spell-out">DSP</say-as>, <say-as interpret-as="spell-out">SSP</say-as> and <break strength="medium" />Arty bee.',
            'read' => 'Journey Further is a biddable media agency, which exists to deliver clarity at speed. Voice searches make up twenty percent of mobile search queries, so understanding this technology is vital to how we work and deliver the best results for our clients. Try asking this skill to define acronyms like DSP, SSP and RTB.',
        ],
    ],

    /* Terms2Response is an associative array to look up a supplied "term" from the user, and work out
     * which term defintion to read out - this is for example as ppc and "pay per click" should give the same
     * response as they're the same term. You'll notice some strange word-based spellings for words - i dont
     * think it ever calls them this way, but they're there just incase.
     */
    'Terms2Response' => [
        'ppc' => 'PPC',
        'p.p.c.' => 'PPC',
        'pee pee sea' => 'PPC',
        'pay per click' => 'PPC',
        'programmatic' => 'programmatic',
        'dsp' => 'DSP',
        'd.s.p.' => 'DSP',
        'demand side platform' => 'DSP',
        'dee es pee' => 'DSP',
        'ssp' => 'SSP',
        's.s.p.' => 'SSP',
        'es es pee' => 'SSP',
        'supply side platform' => 'SSP',
        'dmp' => 'DMP',
        'd.m.p.' => 'DMP',
        'dee em pee' => 'DMP',
        'data management platform' => 'DMP',
        'rtb' => 'RTB',
        'r.t.b.' => 'RTB',
        'arr tea bee' => 'RTB',
        'real time bidding' => 'RTB',
        'real time bid' => 'RTB',
        'realtime bidding' => 'RTB',
        'realtime bid' => 'RTB',
        'd.c.o.' => 'DCO',
        'dco' => 'DCO',
        'dee sea oh' => 'DCO',
        'dynamic creative optimisation' => 'DCO',
        'w.t.f.' => 'WTF',
        'wtf' => 'WTF',
        'seo' => 'SEO',
        's.e.o.' => 'SEO',
        'search engine optimisation' => 'SEO',
        'cro' => 'CRO',
        'c.r.o.' => 'CRO',
        'conversion rate optimisation' => 'CRO',
    ]
];

