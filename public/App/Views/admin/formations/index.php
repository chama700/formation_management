<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f9f9f9;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .btn {
        display: inline-block;
        background-color: #007BFF;
        color: white;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 4px;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    td a {
        color: #dc3545;
        text-decoration: none;
    }

    td a:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            margin-bottom: 15px;
        }

        th, td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        th::before, td::before {
            position: absolute;
            left: 15px;
            width: 45%;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }

        th:nth-of-type(1)::before { content: "Prix"; }
        th:nth-of-type(2)::before { content: "Mode"; }
        th:nth-of-type(3)::before { content: "Cours"; }
        th:nth-of-type(4)::before { content: "Ville"; }
        th:nth-of-type(5)::before { content: "Formateur"; }
        th:nth-of-type(6)::before { content: "Actions"; }
    }
</style>

<h2>Liste des formations</h2>
<a href="/admin/formations/create" class="btn">Ajouter une formation</a>

<table>
    <thead>
    <tr>
        <th>Prix</th>
        <th>Mode</th>
        <th>Cours</th>
        <th>Ville</th>
        <th>Formateur</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($formations as $formation): ?>
        <tr>
            <td><?= $formation['price'] ?> €</td>
            <td><?= ucfirst($formation['mode']) ?></td>
            <td><?= htmlspecialchars($formation['course_name']) ?></td>
            <td><?= htmlspecialchars($formation['city_name']) ?></td>
            <td><?= htmlspecialchars($formation['trainer_name']) ?></td>
            <td>
                <a href="/admin/formations/delete/<?= $formation['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
