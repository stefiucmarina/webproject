<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Report used to explain details of the development process">
    <meta name="keywords" content="project, infoiasi, web" />
    <title>Cat Race on Web</title>
    <link rel="icon" type="image/png" href="/icons/jungle.png" />
    <link rel="stylesheet" href="style_report.css" type="text/css">
</head>

<body>

    <h1>Cat Race on Web Report</h1>

    <div role="contentinfo">
        <ol role="directory">
            <li><a href="#abstract">Abstract</a></li>
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#user-interaction">User Interaction</a>
            <li><a href="#technologies">Technologies</a>
            <li><a href="#services">Features & Services</a>
            <li><a href="#responsabilities">Responsabilities</a></li>
            <li><a href="#bibliography">Bibliography & Sources</a>
        </ol>
        <dl>
            <dt>Authors</dt>
            <dd>
                Begu Maria-Florina
                &amp;
                Darie Camelia-Beatrice
                &amp;
                Stefiuc Alexandra-Marina
            </dd>
        </dl>
    </div>

    <section id="abstract">
        <h1> 1. Abstract </h1>
        <p>Cat Race on Web offers the possibility to users of placing bets on races between cats, view information about
            matches and download the data in different formats (CSV, HTML, Markdown and XML). </p>
    </section>

    <section id="introduction">
        <h1> 2. Introduction </h1>
        <p>The first interaction with our application is through the <i>Home</i> page, where you choose
            either to log in (if you already have an account) or to create a user account. Account
            creation is required to bet (after login you are sent to the <i>Races</i> section). Logged in
            users are also offered the opportunity to see the latest statistics, more precisely, who
            won the last matches. We also have an <i>Admin</i> section where the administrator can add or
            delete races, cats, users.</br>
        </p>
    </section>



    <section id="user-interaction">
        <h1> 3. User interaction </h1>
        <p> <b>1.</b> When the user first enters the site, they will be redirected on the <i>Home</i> page.
            Here they are greeted with the message "start!" (sign up) or "welcome!" (login) as buttons. These
            options can also be found in the menu (top right), along with the <i>Report</i> and <i>About</i> pages. </p>

        <p><b>2.</b> The user can choose between the <i>Login</i> option (if they already have an account) or the
            <i>Sign up</i> option (if they
            want to register). According to their choice, they will be taken on the specific page.
        </p>

        <p><b>3.</b> After the user has logged in, they are sent to the
            <i>Races</i> page, where they can bet on matches for that day, or future ones that are listed.
        </p>

        <p><b>4.</b> If the user is interested in finding information about past matches, they can access the
            <i>History</i> page from the menu. There, they can search a race by selecting a date and the matches from
            that day will be displayed.
        </p>

        <p><b>5.</b>
            The user can see their own activity (bets) in
            the <i>Profile</i> section and find other information such as: reports in CSV, HTML, Markdown and XML format,
            account balance (in dollars), a button for editing personal information and a button for
            contacting technical support (admin).</p>

        <p><b>6.</b>
            In order to find more information about the project, team members and how to contact them, <i>About</i> page
            provides all of the mentioned detalis to the user. </p>

        <p><b>7.</b>
            We also have a separate admin account, and the <i>Admin</i> section
            involves actions such as: viewing general information, adding or deleting cats, matches, users, etc.</p>
    </section>



    <section id="technologies">
        <h1> 4. Technologies </h1>
        <p><b> 1. HTML5, CSS3, JavaScript</b></p>
        <p>
            HTML and CSS were used to create the UI. HTML handles the functionality of the elements of a web page
            and CSS handles the layout and formatting of all elements. HTML and CSS are the main parts of the
            front-end of our application (by now). JavaScript is a lightweight, interpreted, object-oriented language
            and was used for scripting language for Web pages.
        </p>

        <p>
            <b> 2. Project Management: GitHub, Trello</b>
        <p> We used a private repository on GitHub. We splitted our pages to maximize time and keep it "clean".
            Each of us had our own branch, and we uploaded on the main branch the common technologies (such as: menu)
            or the project in the final form. GitHub is popular, reliable and most important, free. </br>
            We used Trello to divide our tasks into several "phases" (and colors, depending on the person
            in charge of that part). There we keep track of all our actions. Specifically, each page went
            through the following phases: "design", "to do", "doing", "testing", "feedback", and "done".
            Trello makes our teamwork easier, we collaborate more easily, we see the progress in real time and
            we consider this an important factor for increasing self-productivity.</p>
        </p>
    </section>



    <section id="services">
        <h1> 5. Features & Services </h1>
        <p><b>1. Authentification </b></br>
            The user connects by typing their username and password. The information will be verified to see if
            the user is in our database (will be implemented in the next part). If they are, they will be redirected on
            the <i>Races</i> page. In the other case,
            they will remain on the <i>Login</i> page. Also, there is a "remember password" option to facilitate login.
            </br>
        </p>
        <p><b>2. Registration</b> </br>
            The register option requires first name, last name, email, password and password
            confirmation in order to create an account, which will be saved in our database. </p>
        <p>You have permission to place or see bets only if you login or sign up in application. </p>
        <p><b>3.View </b> </br>
            The users can observe past matches in the <i>History</i> section and current ones in <i>Races</i>.
            They can see the matches they bet on in their <i>Profile</i> page.
            Admin can also view all the matches, users, cats and the feedback received from clients.</p>
        <p><b>4. Download</b> </br>
            Every user can download the details about their matches and choose a format they like from the following:
            CSV, HTML, Markdown and XML. This action can only be done on the <i>Profile</i> page.</p>
    </section>


    <section id="responsabilities">

        <h1> 6. Responsabilities </h1>
        <p> Responsabilities in our project by now are as follow:</p>
        <b>Begu Maria</b> :
        <ul>
            <li>Profile</li>
            <li>History</li>
            <li>Admin</li>
        </ul>

        <b>Darie Camelia</b> :
        <ul>
            <li>Welcome</li>
            <li>Admin</li>
            <li>About</li>
            <li>ReadMe (GitHub)</li>
        </ul>

        <b>Ștefiuc Marina</b> :
        <ul>
            <li>Login</li>
            <li>Signup</li>
            <li>About</li>
        </ul>

        <p> <b>All three</b> collaborated for:</br>
        <ul>
            <li>Menu</li>
            <li>Races</li>
            <li>Report</li>
            <li>Ideas, styles, color theme, design (type of buttons etc)</li>
            <li>Page management and control</li>
            <li>Responsiveness</li>
            <li>Linkage between pages</li>
        </ul>
        </p>
    </section>


    <section id="bibliography">
        <h1> 7. Bibliography & Sources </h1>
        <ul>
            <li><a href='https://www.w3schools.com/'>Research</a></li>
            <li><a href='https://unsplash.com/'>Pictures</a></li>
        </ul>
    </section>