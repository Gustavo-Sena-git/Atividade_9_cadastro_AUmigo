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

            <input type="submit" values="Enviar">
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
    <div>
        <form action="../services/cadastroAnimal.php">
            Nome do animal: <input type="text" name="nome"><br>

            Idade: <input type="text" name="nome"><br>

            Tipo<br>
            Cachorro: <input type="radio" name="animal" value="cachorro"><br>
            Gato: <input type="radio" name="animal" value="gato"><br>
            Outro: <input type="radio" name="animal" value="coelho">
            Especificar: <input type="text"><br>

            Raça: <input type="text" name="raca"><br>
            Sexo: <br>
            Macho <input type="radio" name="sexo" value="macho"><br>
            Femea <input type="radio" name="sexo" value="femea"><br>
            
            Porte: <select name="porte" id=""><br>
                        <option value="">Selecione o porte</option>
                        <option value="">Grande</option>
                        <option value="">Medio</option>
                        <option value="">Pequeno</option>
                    </select>
            
        </form>
    </div>
</body>
</html>