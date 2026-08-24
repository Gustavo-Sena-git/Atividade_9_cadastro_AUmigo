<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="../services/cadastroCliente.php" method="POST">
            Nome: <input type="text" name="nome"><br>
            Telefone: <input type="tel" name="telefone"><br>
            CPF: <input type="text" name="cpf"><br>

            <input type="submit" values="Cadastrar">
        </form>
        <div>
            <table>
                <thead>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                </thead>
            </table>
        </div>
    </div>
    <h1>---//---//---//---//---//---//---//---//---//---//---//---//---//---//---//---//---//---//---//---</h1>
    <?php
        require_once "../config/conexao.php";

        $sqlUsuarios = "SELECT id, nome FROM cliente";
        $resultUsuarios = $conexao->query($sqlUsuarios);
    ?>

        <div>
            <form action="../services/cadastroAnimal.php" method="POST">
                Nome do animal: <input type="text" name="nome"><br>

                Idade: <input type="text" name="idade"><br>

                Tipo<br>
                Cachorro: <input type="radio" name="animal" value="cachorro"><br>
                Gato: <input type="radio" name="animal" value="gato"><br>
                Outro: <input type="radio" name="animal" value="outro">
                Especificar: <input type="text" name="animal_outro"><br>

                Raça: <input type="text" name="raca"><br>
                Sexo: <br>
                Macho <input type="radio" name="sexo" value="macho"><br>
                Femea <input type="radio" name="sexo" value="femea"><br>

                Porte:
                <select name="porte">
                    <option value="">Selecione o porte</option>
                    <option value="grande">Grande</option>
                    <option value="medio">Medio</option>
                    <option value="pequeno">Pequeno</option>
                </select>
                <br>

                Dono:
                <select name="usuario_id">
                    <option value="">Selecione o dono</option>
                    <?php while ($row = $resultUsuarios->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nome']) ?></option>
                    <?php endwhile; ?>
                </select>
                <br>

                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <div>
            <?php
                require_once "../config/conexao.php";

                $sql = "SELECT animal.id, animal.usuario_id, animal.nome, animal.idade, animal.animal, animal.animal_outro, 
                            animal.raca, animal.sexo, animal.porte, cliente.nome AS dono
                        FROM animal
                        JOIN cliente ON animal.usuario_id = cliente.id";
                $result = $conexao->query($sql);
            ?>

            <table border="1" cellpadding="8">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Tipo</th>
                    <th>Raça</th>
                    <th>Sexo</th>
                    <th>Porte</th>
                    <th>Dono</th>
                    <th>Ações</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nome']) ?></td>
                    <td><?= htmlspecialchars($row['idade']) ?></td>
                    <td><?= $row['animal'] == 'outro' ? htmlspecialchars($row['animal_outro']) : htmlspecialchars($row['animal']) ?></td>
                    <td><?= htmlspecialchars($row['raca']) ?></td>
                    <td><?= htmlspecialchars($row['sexo']) ?></td>
                    <td><?= htmlspecialchars($row['porte']) ?></td>
                    <td>
                        <?= htmlspecialchars($row['dono']) ?>
                        <a href="../cotrollers/detalhes.php?id=<?= $row['usuario_id'] ?>">Detalhes</a>
                    </td>
                    <td>
                        <a href="../cotrollers/editar.php?id=<?= $row['id'] ?>">Editar</a>
                        <a href="../cotrollers/excluir.php?id=<?= $row['id'] ?>" 
                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
</body>
</html>