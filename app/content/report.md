Redovisning
-----------

##Kmom01: PHP-baserade och MVC-inspirerade ramverk
Att börja jobba med Anax-MVC var väldigt svårt. Det kändes som att man från att ha haft lite koll på läget efter oophp-kursen berövades all kontroll och fick omvärdera alla typer att tankar runt hur man strukturerar sin kod. Det märks ju iofs att man kan göra mycket med ramverket, men sättet som man delar upp kod på är än så länge mer förvirrande än till hjälp. Det mesta gick dock smidigt när jag byggde upp ramverket, men när jag försökte att integrera CDice som en extra-sak på egen hand gick jag bet direkt. Jag passade på att göra mig bekant med git och GitHub också och har även lagt upp [detta moment på GitHub](https://github.com/JompaGlitter/phpmvc-kmom01).

####Vilken utvecklingsmiljö använder du?
Jag jobbar lokalt på min mac m.h.a. MAMP som virituell server, TextMate som texteditor och iTerm som terminal-program. Vid upp/ned-laddning av saker till servrar använder jag Forklift som FTP-program.

####Är du bekant med ramverk sedan tidigare?
Jag har ingen egen tidigare erfarenhet av ramverk, jag har bara fått se några andra ramverk under presentationer men har aldrig förstått strukturen i dem eller varför eller hur de används.

####Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?
Inte heller här har jag någon tidigare erfarenhet. Det lär ta ett tag innan alla begrepp sjunker in då jag inte helt och fullt kunnat relatera till dem.

####Din uppfattning om Anax, och speciellt Anax-MVC?
Min uppfattning av Anax från oophp-kursen var att det var ett smart sätt att lägga upp koden. Sättet som nivån höjdes i och med övergången till Anax-MVC gjorde att jag har suttit som en fågelholk väldigt ofta när man fått dela upp koden i så många olika mappar, vyer, tema-filer och samtidigt behöft hålla ihop varför strukturen är som den är. Jag ser fördelarna med ramverket, t.ex. att du kan ha html-kod i separata vyer och skriva textfiler i markdown-syntax som kan kallas in. Men jag ser framför mig att detta kommer att bli en väldigt krävande kurs om jag ska lära mig något på riktigt.


##Kmom02: Kontroller och modeller
Detta momentet fick mig nästan att ge upp hoppet. Efter att ha läst htmlphp-kursen har jag fått in ett visst tankesätt runt hur kod ska användas, men i och med denna kurs måste jag nästan omvärdera allt jag lärt mig i hur koden ska struktureras upp och skickas. Även om det egentligen är samma tankesätt blev hoppet från det ena till det andra nästan övermäktigt. Det känns som att det kommer ta ett tag innan jag har "programmerat om" hjärnan till det nya mönstret att jobba efter. Dokumentationen för Phalcon-ramverket var inte heller någon höjdare att grotta ner sig i och kändes mer avsedd för folk som redan var insatta i ramverkets förfarande än som pedagogiskt underlag för nybörjare som jag. Tacka gudarna för att dbwebb finns!

####Hur känns det att jobba med Composer?
Composer är ett häftigt verktyg som öppnar många dörrar. Det känns dock, precis som med GitHub, fjärranslutning till servrar och program som körs i Terminalen generellt, som att det är många kommandon man måste lära sig för att kunna ansluta, installera, överföra, packa upp saker och så vidare. Men jag ser verkligen möjligheterna med det när man väl fått in rutin för det. Det var dock lurigt att komma igång med, och jag fick aldrig till det med att förkorta composer.phar till bara *"composer"* och tvingades skriva *"php composer.phar"* för varje kommando jag använde.

####Vad tror du om de paket som finns i Packagist?
Det fanns många intressanta plugins, bl.a. för validering av formulär och mycket annat som gör att jag definitivt kommer att kika mer på det framöver. Jag kände dock att övriga uppgiften var så överväldigande att jag inte lade något krut på att implementera mer än nödvändigt såhär i början innan jag har greppat saker ordentligt.

####Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt? 
Efter många om och men fick jag ihop det, men jag kan inte påstå att jag har förstått allt än. Jag fick gå igenom guiden för att utöka Anax-MVC väldigt många gånger och ofta kika tillbaka i den medan jag letade lösningar och löste problem längs vägen. Hela detta moment kändes väldigt rörigt och svårt att greppa.

Jag förstod efter ett tag vad dispatchern gjorde, men det tog lång tid innan jag fick ihop det med hur länkar skulle formuleras, och ännu längre tid innan jag t.ex. fattade att uppdateringsfunktionen för formuläret behövde laddas som en vy, i mitt fall som *editViewAction()* i *CommentController.php* innan värdena i vyn kunde skickas till själva uppdateringsmetoden, i mitt fall *editAction()*. Förhållandet mellan *CommentsInSession.php* och *CommentController* börjar väl så sakteligen att sjunka in, men det var inte sällan som jag bara satt och stirrade utan att förstå vilken kod som skulle var. Detta var nog också mycket för att all användning av request-, redirect-, getPost-funktionerna gjorde kodstrukturen ännu mer invecklat så att det till slut nästan kändes omöjligt att följa kodens gång.

Jag ska erkänna att jag mer än en gång har titta på hur andra i kursen löste detta moment. Jag har rentav ibland kopierat kod rakt av för att få saker att fungera för att sedan sitta och titta i koden vad det är som händer och hur saker hänger ihop, en slags bakåtspårning så att säga. Jag vil dock hålla det förfarandet till ett minimum då jag verkligen vill lära mig detta och inte bara glida igenom kursen på ett bananskal och sitta som en fågelholk i slutändan.

####Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?
Inga formulär i grundkoden var validerade från början. Detta kände jag var en nackdel för egen del i och med att jag inte har förstått hur man Anax-MVC:s valideringsfunktioner fungerar än. Samma sak gäller hemsideadressen i formuläret som tvunget behövde börja med "http://" (vilket jag förifyllde i formuläret när man laddar sidan) för att den inte skulle tolkas som en del av webbappen. Jag tror dock inte att det är några egentliga svagheter om man kan ramverket utan och innan eller hittar något lämpligt plugin via Composer och Pakagist.