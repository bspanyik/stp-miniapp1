# MiniApp
## a Symfony 5 Security project

Users tábla:
- ID (autoincrement) :: PRIMARY
- Active: SMAILLINT(1)
- Name: VARCAHR(255)
- Password: CHAR(20)  :: SHA1 hash
- RFID: VARCHAR(255)
- Company: VARCHAR(255)
- Address: VARCHAR(255)
- Comment: VARCHAR(255)


Data tábla:
- ID (autoincrement) ::  PRIMARY
- RFID: VARCHAR(255) ::  FOREIGN KEY ::: users@ID
- Time: TIMESTAMP :: SECONDARY
- Direction: VARCHAR(255) | lehetséges értékei: "Érkezés", "Távolzás"

Van egy Login képernyő és egy alapform.
Az alap formon megjelenik a
Név: <db_name>
Cég: <db_company>
Cím: <db_cim>
Megj.: <db_comment>
mezők tartalma, illetve ki kell tudni választani egy picker-rel egy hónapot, pl „2020 február”
A picker a DB_ben adott user-hez rögzített rekordok „Time” mezője alapján határozza meg a kiválasztható hónapokat.  (Ha ez nem túl bonyolult. Ha az, akkor ha xart választ ki, így járt.)

A grid oszlopai: Időpont | Mozgás | Időtartam

Amennyiben a Mozgás értéke „Távozás”, úgy a Távozás sor időportjából (time) ki kell vonni a megelőző „Érkezés” sor időpont (time) értékét és ez jelenik meg az Időtartam oszlopban  