<?php

$nom = "El Amrani";
$prenom = "Youssef";
$cne = "G130456789";
$moyenne = 14.5;

if ($moyenne < 10) {
    $mention = "Ajourné";
    $couleur = "red";
} elseif ($moyenne < 12) {
    $mention = "Passable";
    $couleur = "darkorange";
} elseif ($moyenne < 14) {
    $mention = "Assez bien";
    $couleur = "blue";
} elseif ($moyenne < 16) {
    $mention = "Bien";
    $couleur = "limegreen";
} else {
    $mention = "Très bien";
    $couleur = "darkgreen";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord académique</title>

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6f7;
            color: #263238;
            margin: 0;
            padding: 30px 15px;
        }

        main {
            max-width: 900px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }

        section {
            background-color: white;
            padding: 25px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #00000012;
        }

        h2 {
            color: #2980b9;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 12px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #dddddd;
            text-align: center;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <main>
        <h1>Tableau de bord académique</h1>

        <section>
            <h2>Partie 1 : Fiche étudiant</h2>

            <p>
                <strong>Nom et prénom :</strong>
                <?php echo htmlspecialchars($prenom . " " . $nom, ENT_QUOTES, "UTF-8"); ?>
            </p>

            <p>
                <strong>CNE :</strong>
                <?php echo htmlspecialchars($cne, ENT_QUOTES, "UTF-8"); ?>
            </p>

            <p>
                <strong>Moyenne générale :</strong>
                <?php echo $moyenne; ?> / 20
            </p>

            <p>
                <strong>Mention :</strong>
                <span style="color: <?php echo $couleur; ?>;">
                    <?php echo $mention; ?>
                </span>
            </p>
        </section>
        <section>
            <h2>Partie 2 : Relevé de notes par module</h2>

            <?php

            $modules = [
                "PHP / MySQL",
                "Réseaux",
                "Algorithmique",
                "UML",
                "Anglais"
            ];
            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Module</th>
                            <th scope="col">Note / 20</th>
                            <th scope="col">Appréciation</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                        for ($i = 0; $i < count($modules); $i++) {
                            $note = rand(8, 20);

                            $appreciation = $note > 10 ? "Validé" : "Non validé";
                            $couleurNote = $note > 10 ? "darkgreen" : "red";
                        ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $modules[$i]; ?></td>
                                <td><?php echo $note; ?></td>
                                <td style="color: <?php echo $couleurNote; ?>;">
                                    <?php echo $appreciation; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <h2>Partie 3 : Statistiques de la classe</h2>

            <?php
            $effectif = 15;
            $somme = 0;
            $noteMin = 20;
            $noteMax = 5;
            $valides = 0;
            $ajournes = 0;
            $i = 0;

            while ($i < $effectif) {
                $noteClasse = rand(5, 20);
                $somme += $noteClasse;

                if ($noteClasse < $noteMin) {
                    $noteMin = $noteClasse;
                }

                if ($noteClasse > $noteMax) {
                    $noteMax = $noteClasse;
                }

                if ($noteClasse > 10) {
                    $valides++;
                } else {
                    $ajournes++;
                }

                $i++;
            }

            $moyenneClasse = $somme / $effectif;
            ?>

            <p>
                <strong>Effectif total :</strong>
                <?php echo $effectif; ?> étudiants
            </p>

            <p>
                <strong>Moyenne générale de la classe :</strong>
                <?php echo number_format($moyenneClasse, 2, ",", " "); ?> / 20
            </p>

            <p>
                <strong>Note maximale :</strong>
                <?php echo $noteMax; ?> / 20
            </p>

            <p>
                <strong>Note minimale :</strong>
                <?php echo $noteMin; ?> / 20
            </p>

            <p style="color: darkgreen;">
                <strong>Étudiants validés (note &gt; 10) :</strong>
                <?php echo $valides; ?>
            </p>

            <p style="color: red;">
                <strong>Étudiants ajournés (note ≤ 10) :</strong>
                <?php echo $ajournes; ?>
            </p>
        </section>

    
    </main>
</body>
</html>