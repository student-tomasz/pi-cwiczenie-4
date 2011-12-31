# Programowanie internetowe » Ćwiczenie 4

## Treść zadania

> ### Opis
> 
> Zadaniem jest napisanie 3 aplikacji w języku PHP do uploadu, downloadu i
> usuwania plików.
> 
> #### Upload
> 
> Formularz z polem typu file
> 
> Zapis pliku do katalogu. Dane o pliku (id, ściezka do pliku, rozmiar, typ) sa
> w bazie db. Dostep do bazy `user: pi_inf`, `haslo: polska1`. Dostep tylko
> przez volt.
> 
> #### Download
> 
> Lista plikow z bazy. Po kliknieciu na nazwe pliku pobieramy plik:
> 
>     download.php?id=5
> 
> #### Usuwanie plikow z listy
> 
> Po nacisnieciu na ikonke 'skasuj' usuwamy plik
> 
>     usun.php?id=5
> 
> Po zatwierdzeniu w oknie 'confirm' JavaScriptu.
> 
> #### Konwersja plików
> 
> Po nacisnieciu na ikonke do konwersji, pojawia sie okno JavaScriptu z menu:
> standard kodowania pliku wejsciowgo i wyjsciowego
> 
>     konwert.php?id=5&std_in=UTF-8&std_out=ISO-8859-2
> 
> Przy probie konwersji pliku nie tekstowego komunikat o bledzie. Do konwersji
> uzyc `iconv`.
> 
> via [volt](http://www.iem.pw.edu.pl/~ksiwek/pi/lab/cw4_php.html)
