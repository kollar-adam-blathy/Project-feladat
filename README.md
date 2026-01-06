# 🚗 Modern Autókölcsönző Weboldal

Egy modern, reszponzív autókölcsönző rendszer Laravel 11 keretrendszer alapján, teljes CRUD funkcionalitással és professionális adminisztrációs panellel.

## 📋 Tartalomjegyzék
- [Funkciók](#funkciók)
- [Technikai Specifikáció](#technikai-specifikáció)
- [Alapértelmezett Bejelentkezések](#alapértelmezett-bejelentkezések)
- [Főbb Modulok](#főbb-modulok)
- [Szűrési Rendszer](#szűrési-rendszer)
- [Adatbázis Séma](#adatbázis-séma)
- [Felhasználói Szerepkörök](#felhasználói-szerepkörök)

## ✨ Funkciók

### Felhasználóoldal

**Regisztráció és Bejelentkezés**
A rendszer biztonságos autentikációs rendszert biztosít, ahol az új felhasználók egyszerűen regisztrálhatnak email és jelszó megadásával. Az adatok bcrypt titkosítással kerülnek tárolásra. A regisztrációs folyamat során lehetőség van telefonszám és személyes adatok megadására is, amely a bérléskor szükséges lehet. A bejelentkezett felhasználók saját profilt kezelhetnek, ahol bármikor módosíthatják adataikat.

**Autó Keresés és Szűrés**
A weboldal egy intuitív szűrési rendszert kínál, amely segít a felhasználóknak megtalálni a számukra tökéletes autót. A szűrés valós időben működik, az oldal újratöltése nélkül. Lehetőség van szűrni márka alapján (dinamikus lista a rendszerben lévő autók alapján), típus alapján (SUV, Sedan, Coupe, stb.), teljesítményszint alapján (Normál, Sportos vagy Luxus), üzemanyag típusára (Benzin, Dízel, Elektromos, Hibrid), váltótípusra (Manuális, Automata), ülések számára (2-9 személyes autók), és végül az ár szerinti kategóriákra. Az összes szűrő kombinálható, így a felhasználók könnyen szűkíthetik az eredményeket. Az "Alaphelyzetbe állítás" gomb egy kattintásra visszaáll az összes szűrő az alapértelmezett értékre.

**Autó Részletek**
Amikor a felhasználó egy autóra kattint, részletes információkat talál. A részletoldal magában foglalja a teljes specifikációkat (márka, modell, évjárat, rendszám, típus, kategória, váltó, üzemanyag, ülések, szín, futásteljesítmény), nagyméretű képeket az autóról, a napi bérleti díjat, egy leírást az autóról, és a rendelkezésre állás státuszát. Ez lehetővé teszi a felhasználónak, hogy teljes képet kapjon az autó jellemzőiről, mielőtt döntene.

**Foglalás Készítése**
A foglalás folyamata egyszerű és intuitív. A felhasználó kiválasztja a bérlés kezdeti és végdátumát, a rendszer automatikusan kiszámítja az összes bérleti díjat az autó napi árának alapján. A foglalás készítésekor a rendszer ellenőrzi az autó rendelkezésre állását a kiválasztott időszakban. A felhasználónak lehetősége van a foglalást azonnal megerősíteni vagy később visszatérni rá.

**Saját Foglalások és Bérlések**
A bejelentkezett felhasználók "Saját bérlések" szekcióban megtekinthetik az összes korábbi és aktív bérlésüket. Minden bérlésről megtekinthetőek az alapvető információk: az autó adatai (márka, modell, kép), a bérlés dátuma, az összes díj, és a jelenlegi státusz. Az aktív bérléseket könnyen azonosíthatóak, és lehetőség van lemondásra is, ha az alkalmassá válik.

**Profil Kezelés**
A felhasználók saját profil oldalon keresztül kezelhetik személyes adataikat. Itt módosíthatják nevüket, email-jüket, telefonszámukat, valamint szállítási adataikat (város, cím, irányítószám). A profil minden adat biztonságos és titkosított módon kerül tárolásra.

### Admin funkciók

**Dashboard és Statisztikák**
Az admin felhasználók egy átfogó dashboardot érhetnek el, amely valós idejű statisztikákat jelenít meg a rendszer állapotáról. A dashboard megjeleníti az adatbázisban tárolt autók teljes számát, a regisztrált felhasználók számát, az éppen aktív bérlések számát, és az összes bevételt a bérlésekből. Ezek az adatok segítik az admin-okat a rendszer teljesítményének monitorozásában és az üzleti döntésekben.

**Autó Menedzsment**
Az admin teljes CRUD (Create, Read, Update, Delete) kontrollal rendelkezik az autók felett. Új autókat lehet hozzáadni a rendszerhez teljes specifikációval: márka, modell, évjárat, rendszám, típus (SUV, Sedan, stb.), kategória (Normál/Sportos/Luxus), váltó típus, üzemanyag típus, napi bérleti díj, ülések száma, szín, futásteljesítmény. Minden autóhoz fel lehet tölteni képeket. A meglévő autókat szerkeszteni lehet, és bármikor kitörölhetőek a rendszerből. Az admin-ok kezelhetik az autók rendelkezésre állási státuszát is.

**Felhasználó Kezelés**
Az admin kezelhetik az összes felhasználót a rendszerben. Megtekinthetik a felhasználók adatait, módosíthatják azokat, és admin jogosultságokat adhatnak vagy vonhatnak vissza. Ez lehetővé teszi az admin-oknak, hogy új admin felhasználókat hozzanak létre, vagy admin jogokat eltávolítsanak, ha szükséges. Az admin panel felhasználókezelő felületén keresztül könnyen átlátható az összes regisztrált felhasználó listája.

**Bérlések Teljes Áttekintése**
Az admin-ok megtekinthetik az összes bérlés teljes listáját a rendszerben. Minden bérléshez látható az autó adatai (képpel), az ügyfél információi, a bérlés dátuma, az összes díj, és a jelenlegi státusz. Ez lehetővé teszi az admin-ok számára, hogy teljes kontrollal rendelkezzenek a bérlésekről és szükség esetén intézkedjenek.

## 🔍 Szűrési Rendszer

**Összetett Szűrési Lehetőségek**
Az autó listázó oldal egy professzionális szűrési rendszert valósít meg, amely lehetővé teszi a felhasználók számára, hogy finomra hangolják keresésüket. A szűrés teljes mértékben kliens oldalon fut JavaScript segítségével, ezáltal nem igényli az oldal újratöltését. A felhasználók választhatnak a márka alapján (a rendszerben meglévő márkák dinamikus listájából), a típus alapján (SUV, Hatchback, Sedan, Coupe, Cabrio, Kombi), a kategória alapján (Normál, Sportos, Luxus), az üzemanyag típusa alapján (Benzin, Dízel, Elektromos, Hibrid), a váltó alapján (Manuális, Automata), az ülések száma alapján (2, 4, 5, 7, 9 személyes), és az ár alapján (3 kategóriában: 0-15.000 Ft, 15.000-25.000 Ft, 25.000+ Ft).

**Kombinált Szűrés és Keresés**
Az összes szűrő egyszerre kombinálható, így a felhasználók a lehető legpontosabban találhatják meg a keresett autót. Például szűrhet egy sportos, 5 személyes, diesel üzemanyagú, 15.000-25.000 Ft ár között autóra. Ezen felül van egy szabad szöveg keresési mező is, amely valós időben keresi meg az autókat a márka és modell alapján. Az "Alaphelyzetbe állítás" gomb lehetőséget ad a felhasználóknak, hogy egy kattintásra összes szűrőt és keresést nullázza.

**Valós Idejű Szűrés**
A szűrés dinamikus és azonnali. Ahogy a felhasználó módosít egy szűrőt, az autók listája azonnal frissül az új feltételek alapján. Ez nem igényli az oldal újratöltését, így a felhasználók gyors és zökkenőmentes élményt kapnak.

## 🛠️ Technikai Specifikáció

### Alapszínek és Design
- **Primer kék**: #0066FF - Fő akcióelemek
- **Másodlagos cyan**: #4CC4FF - Kiemelt elemek
- **Lila**: #a855f7 - Sportos/Luxus kategóriák
- **Szürke háttér**: #1e2639 - Dark theme alapszín

### Felhasználói Adatok
- **Telefon szám**: Opcionális, nemzeti formátumú
- **Email**: Egyedi, validált
- **Jelszó**: Bcrypt titkosítás


## 👤 Alapértelmezett Bejelentkezések

### Admin fiók
- **Email:** admin@example.com
- **Jelszó:** admin123

### Felhasználó fiók (minta)
- **Email:** user@example.com
- **Jelszó:** user123

## 📚 Főbb Modulok

### Models
- **Car** - Autó entitás, kapcsolódások, akceszor metódusok (transmission_name, fuel_type_name)
- **User** - Felhasználó, autentikáció, admin státusz
- **Rental** - Bérlés, dátumok, ár kalkuláció
- **Customer** - Ügyfél adatok (alternatív bérlők)

### Controllers
- **AdminController** - Admin operations (CRUD, statisztikák)
- **RentalController** - Bérlés kezelés
- **ProfileController** - Profil szerkesztés
- **AuthController** - Bejelentkezés/Kijelentkezés

### Views
- **admin/** - Admin panelhierarchia
- **cars/** - Autó listázás, részletek, szűrés
- **rentals/** - Bérlés kezelés
- **profile/** - Felhasználói profil

## 📊 Adatbázis Séma

### Cars Tábla - Autó Entitás
A `cars` tábla tartalmazza az összes rendelkezésre álló autó alapinformációit és specifikációit. Minden autó egy egyedi azonosítóval (id) rendelkezik, amely kulcsként funkcionál más táblák számára. A márka és modell mezők az autó alapazonosítására szolgálnak. Az évjárat és rendszám mezők a legális és műszaki adatokat tárolják. A típus mező jelöli a járműkategóriát (SUV, Sedan, stb.), míg az osztály mező (Normál, Sportos, Luxus) a teljesítményi vagy luxusszintet. A váltó (transmission) és üzemanyag típus (fuel_type) mezők a technikai jellemzőket rögzítik. A napi bérleti díj (daily_price) a gazdasági adat, míg az ülések száma, szín, futásteljesítmény, képfájl elérési útvonala és rendelkezésre állás státusza (available) az operatív információkat tartalmazzák. A leírás mező szabad szöveg, amely az autó speciális jellemzőit sorolja fel.

### Rentals Tábla - Bérlés Nyilvántartás
A `rentals` tábla nyomon követi az összes bérlési tranzakciót. Minden bérléshez rögzítésre kerül, mely autó (car_id), mely felhasználó (user_id) bérlte, valamint opcióként mely ügyfél (customer_id) név alatt köttetett a szerződés. A kezdő dátum (start_date) és végdátum (end_date) meghatározza a bérlés időtartamát. Az összes ár (total_price) az automatikusan kiszámított bérleti díj. A státusz mező jelöli a bérlés aktuális állapotát (aktív, befejezett, lemondott). Az időbélyegek (created_at, updated_at) az adatbázis-kezelés támogatják.

### Users Tábla - Felhasználói Fiókok
A `users` tábla a felhasználói fiókokat és személyes adatokat tároja. Minden felhasználó egyedi email-lel és bcrypt titkosított jelszóval rendelkezik. A telefonszám mező opcionális, személyes azonosításra szolgál. Az `is_admin` mező egy boolean flag, amely meghatározza, hogy a felhasználó rendszeradminisztrátor-e. A felhasználók szállítási adatait (város, cím, irányítószám) szintén a users táblában tároljuk, amelyek a bérléskor szükségesek lehetnek.

## 👥 Felhasználói Szerepkörök

### Vendég Felhasználó
A nem bejelentkezett felhasználók korlátozott hozzáféréssel rendelkeznek. Böngészhetik az autók teljes katalógusát, használhatják az összes szűrési és keresési lehetőséget, valamint megtekinthetik az autók részletes specifikációit és képeit. Azonban a bérléshez szükséges a regisztráció és bejelentkezés. A vendég felhasználókat az alkalmazás félénken ráirányítja a regisztrációs oldalra, ahol egyszerűen létre tudnak hozni egy új fiókot.

### Bejelentkezett Felhasználó
A regisztrált felhasználók teljes hozzáféréssel rendelkeznek az alkalmazáshoz. Megtekinthetik és szűrhetik az autókat, foglalást készíthetnek, megtekinthetik az összes korábbi és aktív bérlésüket, valamint kezelhetik a saját profiladataikat. A bérlésekehez szükséges információk (telefonszám, cím, város) a profil oldalon adhatók meg. A felhasználók lemondhatják az aktív bérléseiket, ha valamilyen oknál fogva mégsem szükséges az autó.

### Admin Felhasználó
Az adminisztrátor felhasználók a rendszer legfelső szintű hozzáféréssel rendelkeznek. Ők kezelhetik az összes autót az adatbázisban (hozzáadás, módosítás, törlés), felhasználó jogosultságokat adhatnak és vonhatnak vissza, megtekinthetik az összes bérlést és a kapcsolódó információkat, valamint hozzáféréssel rendelkeznek a teljes statisztikai dashboardhoz, amely valós idejű információkat nyújt a rendszer állapotáról. Az admin-ként működő felhasználók az általános felhasználói funkciók mellett még ezeket az emelt szintű lehetőségeket is használhatják.

## 🎨 Design és Felhasználói Élmény

**Modern Felhasználói Interfész**
Az alkalmazás egy kortárs, professzionális dizájnnal rendelkezik. A felhasználói felület gradientek, árnyékok és félig átlátszó elemek segítségével modern és vonzó. Az alapszín séma egy sötét témát (dark theme) használ, amely csökkenti a szem terhelését és modern, felső kategóriás megjelenést ad az alkalmazásnak. A primer kék szín (#0066FF) az elsődleges akcióelemekre és gombok jelzésére szolgál, míg a másodlagos cyan szín (#4CC4FF) az épp kiemelt vagy fontosabb elemekre.

**Reszponzív Tervezés**
Az alkalmazás teljes mértékben reszponzív és az összes képernyőméreten optimálisan működik. Mobiltelefononoktól kezdve a tableteken és asztali számítógépeken is kiválóan jelenik meg az alkalmazás. A grid-alapú elrendezés automatikusan igazodik a rendelkezésre álló helynek, így az autók kártyái mindig szépségesen és logikusan jelennek meg, függetlenül a képernyő méretétől.

**Animációk és Átmenetek**
Az alkalmazás zökkenőmentes CSS animációkat és átmeneteket használ, amely kellemessé és interaktívvá teszi a felhasználói élményt. A gombok, linkek és más interaktív elemek finom átmeneteket mutatnak, amely visszajelzést ad a felhasználónak az interakciójáról.

**Hozzáférhetőség**
Az alkalmazás az akadálymentesítési (accessibility) gyakorlatokat követi. Az összes form szövegmezőhöz megfelelő labelek kapcsolódnak, amely segítésül szolgál a képernyőolvasó szoftvereknek. Az alkalmazás jól strukturált, szemantikus HTML kódot használ, amely biztosítja, hogy az összes felhasználó, függetlenül az akadályozottságtól, hozzáfér az információkhoz.

---

**Verzió:** 0.2.1
