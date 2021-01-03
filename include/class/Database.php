<?php

class Database
{
    private $link;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = require_once 'config_bd.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbName'] . ';charset=' . $config['charset'];
        $this->link = new PDO($dsn, $config['userName'], $config['password']);

        return $this;
    }

    //============================= Select ================================//

    /**
     * @return array
     */
    public function SelectGames()
    {
        $gamesAll = $this->link->query("SELECT * FROM `games`");
        while($game = $gamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    /**
     * @return array
     */
    public function SelectGamesMini()
    {
        $gamesMiniAll = $this->link->query("SELECT * FROM `games` LIMIT 6");
        while($game = $gamesMiniAll->fetch(PDO::FETCH_ASSOC))
        {
            $games[] = $game;
        }
        return $games;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function SelectGame($id)
    {
        $game = $this->link->prepare("SELECT * FROM `games` WHERE `id` = ?");
        $game->execute(array($id));
        return $game->fetch(PDO::FETCH_ASSOC);
    }

    public function SelectStock()
    {
        $stock = $this->link->query("SELECT * FROM `stock` WHERE `id` = 1");
        return $stock->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $login
     * @return mixed
     */
    public function SelectUser($login)
    {
        $user = $this->link->prepare("SELECT * FROM `admins` WHERE `login` = ?");
        $user->execute(array($login));
        return $user->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function SelectAdmin($userId)
    {
        $user = $this->link->prepare("SELECT admin_permission.add_data, admin_permission.upd_data, admin_permission.del_data, `login` FROM `admins` INNER JOIN `admin_permission` WHERE admins.id = ? AND `permission` = admin_permission.id");
        $user->execute(array($userId));
        return $user->fetch(PDO::FETCH_ASSOC);
    }

    //============================= Для отчетов ================================//

    /**
     * @return array
     */
    public function SelectCountSales()
    {
        $CountSalesAll = $this->link->query("SELECT DATE(`date`), SUM(games.cost), COUNT(sales.id) FROM `sales` INNER JOIN `games` WHERE `date` > Date_Format(CURDATE()- INTERVAL 6 day,'%y%m%d') AND games.id = `id_game` GROUP BY DAY(`date`) ORDER by DAY(`date`)");
        while($CountSale = $CountSalesAll->fetch(PDO::FETCH_ASSOC))
        {
            $CountSales[] = $CountSale;
        }
        return $CountSales;
    }

    /**
     * @return array
     */
    public function SelectGameSales()
    {
        $CountSalesAll = $this->link->query("SELECT games.name, COUNT(sales.id) FROM `sales` INNER JOIN `games` WHERE `date` > Date_Format(CURDATE()- INTERVAL 6 day,'%y%m%d') AND id_game = games.id GROUP BY `id_game`");
        while($CountSale = $CountSalesAll->fetch(PDO::FETCH_ASSOC))
        {
            $CountSales[] = $CountSale;
        }
        return $CountSales;
    }

    /**
     * @return array
     */
    public function SelectAmountGames()
    {
        $AmountGamesAll = $this->link->query("SELECT `name`,`amount` FROM `games` GROUP BY `name`");
        while($AmountGame = $AmountGamesAll->fetch(PDO::FETCH_ASSOC))
        {
            $AmountGames[] = $AmountGame;
        }
        return $AmountGames;
    }


    //============================= Insert ================================//

    /**
     * @param $name
     * @param $cost
     * @param $amount
     * @param $img
     * @param $description
     * @param $activation
     * @param $platform
     * @param $region
     * @param $category
     * @param $activation_type
     */
    public function AddGame($name, $cost, $amount, $img, $description, $activation, $platform, $region, $category, $activation_type)
    {
        $game = $this->link->prepare("INSERT INTO `games` (`name`, `cost`, `amount`, `img`, `description`, `activation`, `platform`, `region`, `category`, `activation_type`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $game->execute(array($name, $cost, $amount, $img, $description, $activation, $platform, $region, $category, $activation_type));
    }

    /**
     * @param $idGame
     * @param $date
     */
    public function AddSale($idGame, $date)
    {
        $sale = $this->link->prepare("INSERT INTO `sales` (`id_game`, `date`) VALUES(?, ?)");
        $sale->execute(array($idGame, $date));
    }

    //============================= Update ================================//

    /**
     * @param $id
     * @param $name
     * @param $cost
     * @param $amount
     * @param $img
     * @param $description
     * @param $activation
     * @param $platform
     * @param $region
     * @param $category
     * @param $activation_type
     */
    public function UpdateGame($id, $name, $cost, $amount, $img, $description, $activation, $platform, $region, $category, $activation_type)
    {
        $game = $this->link->prepare("UPDATE `games` SET `name` = ?, `cost` = ?, `amount` = ?, `img` = ?, `description` = ?, `activation` = ?, `platform` = ?, `region` = ?, `category` = ?, `activation_type` = ?  WHERE `id` = ?");
        $game->execute(array($name, $cost, $amount, $img, $description, $activation, $platform, $region, $category, $activation_type, $id));
    }

    /**
     * @param $idGame
     * @param $description
     * @param $img
     */
    public function UpdateStock($idGame, $description, $img)
    {
        $stock = $this->link->prepare("UPDATE `stock` SET `id_game` = ?, `description` = ?, `img` = ? WHERE `id` = 1");
        $stock->execute(array($idGame, $description, $img));
    }

    //============================= Delete ================================//

    /**
     * @param $id
     */
    public function DeleteGame($id)
    {
        $game = $this->link->prepare("DELETE FROM `games`  WHERE `id` = ?");
        $game->execute(array($id));
    }
}