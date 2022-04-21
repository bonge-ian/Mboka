<?php

declare(strict_types=1);

namespace App\Faker\Provider\en_KE;

class Person extends \Faker\Provider\Person
{
    /**
     * It is very common in Uganda for people to arrange their names as
     * lastname(surname) firstname
     */
    protected static $maleNameFormats = [
        '{{firstNameMale}} {{lastName}}',
        '{{lastName}} {{firstNameMale}}',
        '{{firstNameMale}} {{lastNameMale}}',
        '{{lastNameMale}} {{firstNameMale}}'
    ];

    /**
     * It is very common in Uganda for people to arrange their names as
     * lastname(surname) firstname
     */
    protected static $femaleNameFormats = [
        '{{firstNameFemale}} {{lastName}}',
        '{{lastName}} {{firstNameFemale}}',
        '{{firstNameFemale}} {{lastNameFemale}}',
        '{{lastNameFemale}} {{firstNameFemale}}'
    ];

    protected static $firstNameMale = [
        'Aaron', 'Abdul', 'Abdullah', 'Abraham', 'Adam', 'Agustin', 'Ahmad', 'Ahmed', 'Akeem', 'Albert', 'Alex', 'Alfred', 'Ali', 'Allan', 'Allen', 'Alvin', 'Amani', 'Ambrose', 'Amos', 'Anderson', 'Andrew', 'Angel', 'Anthony', 'Arnold', 'Arthur', 'Austin',
        'Barnet', 'Barry', 'Ben', 'Benjamin', 'Bennie', 'Benny', 'Bernard', 'Berry', 'Berta', 'Bertha', 'Bill', 'Billy', 'Bobby', 'Boyd', 'Bradley', 'Brian', 'Bruce',
        'Caesar', 'Caleb', 'Carol', 'Cecil', 'Charles', 'Charlie', 'Chris', 'Christian', 'Christopher', 'Cleveland', 'Clifford', 'Clinton', 'Collin', 'Conrad',
        'Dan', 'Daren', 'Dave', 'David', 'Dax', 'Denis', 'Dennis', 'Derek', 'Derick', 'Derrick', 'Don', 'Donald', 'Douglas', 'Dylan',
        'Earnest', 'Eddie', 'Edgar', 'Edison', 'Edmond', 'Edmund', 'Edward', 'Edwin', 'Elias', 'Elijah', 'Elliot', 'Emanuel', 'Emmanuel', 'Eric', 'Ernest', 'Ethan', 'Eugene', 'Ezra',
        'Felix', 'Francis', 'Frank', 'Frankie', 'Fred',
        'Gaetano', 'Gaston', 'Gavin', 'Geoffrey', 'George', 'Gerald', 'Gideon', 'Gilbert', 'Glen', 'Godfrey', 'Graham', 'Gregory',
        'Hans', 'Harold', 'Henry', 'Herbert', 'Herman', 'Hillary', 'Howard',
        'Ian', 'Isaac', 'Isaiah', 'Ismael',
        'Jabari', 'Jack', 'Jackson', 'Jacob', 'Jamaal', 'Jamal', 'Jasper', 'Jayson', 'Jeff', 'Jeffery', 'Jeremy', 'Jimmy', 'Joe', 'Joel', 'Joesph', 'Johathan', 'John', 'Johnathan', 'Johnny', 'Johnson', 'Jonathan', 'Jordan', 'Joseph', 'Joshua', 'Julian', 'Julio', 'Julius', 'Junior',
        'Kaleb', 'Keith', 'Kelly', 'Kelvin', 'Ken', 'Kennedy', 'Kenneth', 'Kevin', 'Kim',
        'Lawrence', 'Lewis', 'Lincoln', 'Lloyd', 'Luis', 'Luther',
        'Mackenzie', 'Martin', 'Marvin', 'Mathew', 'Mathias', 'Matt', 'Maurice', 'Max', 'Maxwell', 'Mckenzie', 'Micheal', 'Mike', 'Milton', 'Mitchel', 'Mitchell', 'Mohamed', 'Mohammad', 'Mohammed', 'Morris', 'Moses', 'Muhammad', 'Myles',
        'Nasir', 'Nat', 'Nathan', 'Newton', 'Nicholas', 'Nick', 'Nicklaus', 'Nickolas', 'Nicolas', 'Noah', 'Norbert',
        'Oscar', 'Owen',
        'Patrick', 'Paul', 'Peter', 'Philip',
        'Rashad', 'Rasheed', 'Raul', 'Ray', 'Raymond', 'Reagan', 'Regan', 'Richard', 'Richie', 'Rick', 'Robb', 'Robbie', 'Robert', 'Robin', 'Roger', 'Rogers', 'Ronald', 'Rowland', 'Royal', 'Ryan',
        'Sam', 'Samson', 'Sean', 'Shawn', 'Sid', 'Sidney', 'Solomon', 'Steve', 'Stevie', 'Stewart', 'Stuart',
        'Taylor', 'Theodore', 'Thomas', 'Timmy', 'Timothy', 'Titus', 'Tom', 'Tony', 'Travis', 'Trevor', 'Troy', 'Trystan', 'Tyler', 'Tyson',
        'Victor', 'Vince', 'Vincent', 'Vinnie',
        'Walter', 'Warren', 'Wilford', 'Wilfred', 'Will', 'William', 'Willis', 'Willy', 'Wilson'
    ];

    protected static $firstNameFemale = [
        'Abigail', 'Adela', 'Adrianna', 'Adrienne', 'Aisha', 'Alice', 'Alisha', 'Alison', 'Amanda', 'Amelia', 'Amina', 'Amy', 'Anabel', 'Anabelle', 'Angela', 'Angelina', 'Angie', 'Anita', 'Anna', 'Annamarie', 'Anne', 'Annette', 'April', 'Arianna', 'Ariela', 'Asha', 'Ashley', 'Ashly', 'Audrey', 'Aurelia',
        'Barbara', 'Beatrice', 'Bella', 'Bernadette', 'Beth', 'Bethany', 'Bethel', 'Betsy', 'Bette', 'Bettie', 'Betty', 'Blanche', 'Bonita', 'Bonnie', 'Brenda', 'Bridget', 'Bridgette', 'Carissa', 'Carol', 'Carole', 'Carolina', 'Caroline', 'Carolyn', 'Carolyne', 'Catharine', 'Catherine', 'Cathrine', 'Cathryn', 'Cathy', 'Cecelia', 'Cecile', 'Cecilia', 'Charity', 'Charlotte', 'Chloe', 'Christina', 'Christine', 'Cindy', 'Claire', 'Clara', 'Clarissa', 'Claudine', 'Cristal', 'Crystal', 'Cynthia',
        'Dahlia', 'Daisy', 'Daniela', 'Daniella', 'Danielle', 'Daphne', 'Daphnee', 'Daphney', 'Darlene', 'Deborah', 'Destiny', 'Diana', 'Dianna', 'Dina', 'Dolly', 'Dolores', 'Donna', 'Dora', 'Dorothy', 'Dorris',
        'Edna', 'Edwina', 'Edyth', 'Elizabeth', 'Ella', 'Ellen', 'Elsa', 'Elsie', 'Emelia', 'Emilia', 'Emilie', 'Emily', 'Emma', 'Emmanuelle', 'Erica', 'Esta', 'Esther', 'Estella', 'Eunice', 'Eva', 'Eve', 'Eveline', 'Evelyn',
        'Fabiola', 'Fatima', 'Fiona', 'Flavia', 'Flo', 'Florence', 'Frances', 'Francesca', 'Francisca', 'Frida',
        'Gabriella', 'Gabrielle', 'Genevieve', 'Georgiana', 'Geraldine', 'Gertrude', 'Gladys', 'Gloria', 'Grace', 'Gracie',
        'Helen', 'Hellen', 'Hilda', 'Hillary', 'Hope',
        'Imelda', 'Isabel', 'Isabell', 'Isabella', 'Isabelle',
        'Jackie', 'Jacklyn', 'Jacky', 'Jaclyn', 'Jacquelyn', 'Jane', 'Janelle', 'Janet', 'Jaquelin', 'Jaqueline', 'Jenifer', 'Jennifer', 'Jessica', 'Joan', 'Josephine', 'Joy', 'Joyce', 'Juanita', 'Julia', 'Juliana', 'Julie', 'Juliet', 'Justine',
        'Katarina', 'Katherine', 'Katheryn', 'Katrina',
        'Laura', 'Leah', 'Leila', 'Lilian', 'Lillian', 'Lilly', 'Lina', 'Linda', 'Lisa', 'Lora', 'Loraine', 'Lucie', 'Lucy', 'Lulu', 'Lydia',
        'Mabel', 'Maggie', 'Mandy', 'Margaret', 'Margarete', 'Margret', 'Maria', 'Mariah', 'Mariam', 'Marian', 'Mariana', 'Mariane', 'Marianna', 'Marianne', 'Marie', 'Marilyne', 'Marina', 'Marion', 'Marjorie', 'Marjory', 'Marlene', 'Mary', 'Matilda', 'Maudie', 'Maureen', 'Maya', 'Meagan', 'Melisa', 'Melissa', 'Melody', 'Michele', 'Michelle', 'Minerva', 'Minnie', 'Miracle', 'Monica',
        'Nadia', 'Naomi', 'Naomie', 'Natalia', 'Natalie', 'Natasha', 'Nichole', 'Nicole', 'Nina', 'Nora',
        'Pamela', 'Patience', 'Patricia', 'Pauline', 'Pearl', 'Phoebe', 'Phyllis', 'Pink', 'Pinkie', 'Priscilla', 'Prudence',
        'Rachael', 'Rachel', 'Rebeca', 'Rebecca', 'Rhoda', 'Rita', 'Robyn', 'Rose', 'Rosemary', 'Ruth', 'Ruthe', 'Ruthie',
        'Sabina', 'Sabrina', 'Salma', 'Samantha', 'Sandra', 'Sandy', 'Sarah', 'Serena', 'Shakira', 'Sharon', 'Sheila', 'Sierra', 'Sonia', 'Sonya', 'Sophia', 'Sophie', 'Stacey', 'Stacy', 'Stella', 'Susan', 'Susana', 'Susanna', 'Susie', 'Suzanne', 'Sylvia',
        'Tabitha', 'Teresa', 'Tess', 'Theresa', 'Tia', 'Tiffany', 'Tina', 'Tracy', 'Trinity', 'Trisha', 'Trudie', 'Trycia',
        'Ursula',
        'Valentine', 'Valerie', 'Vanessa', 'Veronica', 'Vickie', 'Vicky', 'Victoria', 'Viola', 'Violet', 'Violette', 'Viva', 'Vivian', 'Viviane', 'Vivianne', 'Vivien', 'Vivienne',
        'Wanda', 'Wendy', 'Whitney', 'Wilma', 'Winifred',
        'Yvette', 'Yvonne',
        'Zita', 'Zoe'
    ];

    protected static $lastNameMale = [
        'Cheruiyot', 'Mohammed', 'Mugwe',
        "Kiprono",
        "Kipchirchir",
        "Kipkosgei",
        "Kiptoo",
        "Cheruiyot",
        "Nyanjera ",
        "Nyachae",
        "Makori ",
        "Kamau",
        "Karanja",
        "Ondiek",
        "Mugo",
        "Mutinda",
        "Odhiambo",
        "Wambua",
        "Nzioka",
        "Muriithi",
        "Kariuki",
        "Musyoka",
        "Jomo",
        "Mbugua",
        "Otieno",
        "Mogoka",
        "Nyabuto",
        "Odinga",
        "Kipchoge",
        "Lemayain",
        "Ndii",
        "Kioko"
    ];

    protected static $lastNameFemale = [
        "Jepkorir",
        "Jepkoech",
        "Jemutai",
        "Jebet",
        "Jelagat (Jeplangat)",
        "Jepkirui",
        "Jepkemboi",
        "Jepngetich",
        "Jerotich",
        "Jepngeno",
        "Jerono",
        "Jepkeino",
        "Jeplimo",
        "Jepngeny",
        "Jepkosgei",
        "Jepchirchir",
        "Jeptanui",
        "Jepketer",
        "Jepchoge",
        'Wanjiku',
        'Atieno',
        'Achieng', 'Fatma', 'Wanjiku', 'Aoko', 'Waguthi', 'Mueni', 'Kavindu', 'Wanja', 'Wanza', 'Njeri', 'Waiguru',
        'Mahoro', 'Juma',
        'Gathoni', 'Gatete', 'Wairimu', 'Mukami', 'Kairu', 'Mumbi', 'Ngina', 'Ngendo', 'Nyokabi', 'Nyawira', 'Naliaka', 'Nafula', 'Nekesa', 'Mumbua ', 'Ndila ', 'Nyaboke ', 'Nyathera ', 'Kerubo ', 'Kwamboka', 'Wayua'
    ];

    protected static $lastName = [
        "Lemayian",
        "Kiserian",
        "Naserian",
        "Barmasai",
        "Koinet",
        "Sironka",
        "Kipkorir",
        "Kipkoech",
        "Kimutai",
        "Kibet",
        "Ruto",
        "Kipkemboi",
        "Kipkirui",
        "Kiprono",
        "Kipchirchir",
        "Kipkosgei",
        "Kiptoo",
        "Cheruiyot",
        "Nyanjera ",
        "Nyachae",
        "Makori ",
        "Kamau",
        "Karanja",
        "Mbugua",
        "Wainaina",
        "Ouko",
        "Otieno",
        "Ocheing",
        "Mohammed",
        "Ondiek",
        "Mugo",
        "Mutinda",
        "Odhiambo",
        "Wambua",
        "Nzioka",
        "Muriithi",
        "Kariuki",
        "Musyoka",
        "Musyoki",
        "Mutuku",
        "Simiyu",
        "Wanjala",
        "Wafula",
        "Wanyonyi",
        "Nyongesa",
        "Ramogi",
        "Nyang'au",
        "Raila",
        "Gor",
        "Owino",
        "Opondo",
        "Oluoch",
        "Waweru",
        "Njogu",
        "Ngigi",
        "Ndegwa",
        "Muthee",
    ];

    public function lastName($gender = null)
    {
        if ($gender === static::GENDER_MALE) {
            return static::lastNameMale();
        }
        if ($gender === static::GENDER_FEMALE) {
            return static::lastNameFemale();
        }

        return static::randomElement(static::$lastName);
    }

    public static function lastNameMale()
    {
        return static::randomElement(static::$lastNameMale);
    }

    public static function lastNameFemale()
    {
        return static::randomElement(static::$lastNameFemale);
    }
}
