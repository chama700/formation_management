<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajouter un formateur</title>
    <style>
        :root {
            --moodle-blue: #005a9c;
            --moodle-light-blue: #0078d4;
            --moodle-orange: #f58220;
            --moodle-gray-light: #f3f6f8;
            --moodle-gray-dark: #4a4a4a;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--moodle-gray-light);
            color: var(--moodle-gray-dark);
        }

        .admin-form-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
            padding: 2rem 2.5rem;
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
        }

        .admin-form-container:hover {
            box-shadow: 0 6px 18px rgb(0 0 0 / 0.15);
        }

        .admin-form-container h2 {
            color: var(--moodle-blue);
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.8rem;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 0.6rem 0.85rem;
            border: 1.5px solid #cbd5e1;
            border-radius: 6px;
            font-size: 1rem;
            margin-bottom: 1.25rem;
            box-sizing: border-box;
            transition: border-color 0.25s ease;
            resize: vertical;
            font-family: inherit;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--moodle-light-blue);
            box-shadow: 0 0 5px var(--moodle-light-blue);
            background-color: #fff;
        }

        textarea {
            min-height: 100px;
        }

        button {
            background-color: var(--moodle-orange);
            border: none;
            color: white;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgb(245 130 32 / 0.4);
        }

        button:hover {
            background-color: #d06900; /* Darker orange */
            box-shadow: 0 6px 12px rgb(208 105 0 / 0.6);
        }
    </style>
</head>
<body>

<div class="admin-form-container max-w-lg mx-auto bg-white rounded-lg shadow-lg p-8 mt-12 font-sans">
    <h2>Ajouter un formateur</h2>
    <form action="/admin/trainers/store" method="post" enctype="multipart/form-data" autocomplete="off">
        <label for="firstName">Prénom :</label>
        <input type="text" id="firstName" name="firstName" required placeholder="Entrez le prénom" />

        <label for="lastName">Nom :</label>
        <input type="text" id="lastName" name="lastName" required placeholder="Entrez le nom" />

        <label for="description">Description :</label>
        <textarea id="description" name="description" required placeholder="Décrivez le formateur..."></textarea>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*" />

        <button type="submit">Ajouter</button>
    </form>
</div>

</body>
</html>
