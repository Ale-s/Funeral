Setarile locale se fac in app/config/config.local.php

Datorita setarilor din .htaccess toate requesturile ajung la index.php

Acolo se analizeaza URL-ul si se identifica controller-ul care se ocupa de request, precum si ce metoda anume din controller e apelata; apoi se executa acea metoda.


1. Ca prim pas, analizati bine cum functioneaza framework-ul sa intelegeti structura


2. Uitati-va cum sunt implementate lucruri ca:

	- Modelele (ex: model_admin)
	- Formularele (ex: formularul de login)
	- Etc.

E important sa intelegeti tot mersul:

- ce se face in controller
	- se instantiaza modele, se fac procesari de formulare etc
- ce se face in model
	- singurul loc unde se acceseaza baza de date
	- modul in care e implementat un model:
		- sunt metode statice pentru toate actiunile ce nu sunt strict legate de o instanta a unui obiect
			- de exemplu le folositi sa instantiati obiecte: model_admin::load_by_id($id) sau sa validati
		- sunt metode non-statice pentru actiunile ce tin de un obiect
			- model_admin->logout()
			- sau un exemplu mai bun:

				$category = model_category::load_by_id($category_id)
				$category->get_products();

				metoda get_products() ar fi ceva de genul:

					- instantiati $db
					- scoateti printr-un query din tabela de legatura toate id-urile de produse ale categoriei
					- faceti un loop prin aceste id-uri si instantiati model_product::load_by_id($id)
					- returnari un array de obiecte de tip model_product

- ce se face in view
	- html va fi doar in view
	- nu se fac procesari, ci doar se folosesc variabile pe care le-ai initializat in controller
	- etc

3. E si un sql care creaza baza de date cu tabela admin.
