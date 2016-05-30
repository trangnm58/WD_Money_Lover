<?php
namespace App\Controller;

use App\Controller\AppController;


// Create
/**
 * Wallets Controller
 *
 * @property \App\Model\Table\WalletsTable $Wallets
 */
class WalletsController extends AppController
{
    /**
     * Add wallet into Database
     *
     * @param Wallet $newWallet
     * @return Id of that wallet added
     */
    public function addWallet(Wallet $newWallet)
    {
        $walletTable = new WalletsTable();
        if ($walletTable.insert($newWallet)) {
            return $newWallet.getId();
        } else {
            return false;
        }        
    }

    /**
     * Updates wallet info
     *
     * @param Wallet $wallet
     * @return boolean variable, it is true if set successfully
     */
    public function updateWaletInfo(Wallet $newWallet)
    {
        $walletTable = new WalletsTable();
        if ($walletTable.update($newWallet)) {
            return true;
        } else {
            return false;
        }     
    }
    
    /**
     * Sets current wallet for accountId
     *
     * @param accountId and WalletId
     * @return boolean variable, it is true if set successfully
     */
    public function setCurrentWallet($accountId, $walletId)
    {
        $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        $query1 = "SELECT username FROM accounts where id = $accountId";
        $query2 = "SELECT name FROM wallets where id = $walletId";
        $result1 = mysql_query($query1,$conn);
        $result2 = mysql_query($query2, $conn);

        if(mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
            $query = "UPDATE wallets SET account_id = $account_id WHERE id = $walletId";
            $result = mysql_query($query,$conn);
            $conn.close();
        }
    }

    /**
     * Transfers money method between fromWallet and toWallet
     *
     * @param two wallet objects and amount of money that needs to transfer
     * @return arrary as json has properties: fromAmount and toAmount as the current money amount of fromWallet and toWallet object after transfering     
     */
    public function transferMoney(Wallet $fromWallet, Wallet $toWallet, $amount) {
        if ($fromWallet.getAccount_id() == $toWallet.getAccount_id() && $fromWallet.getAmount() >= $amount && $amount > 0) {
            $fromAmount = $fromWallet.getAmount() - $amount;
            $toAmount = $toWallet.getAmount() + $amount;
            $fromWallet.setAmount($fromAmount);
            $toWallet.setAmount($toAmount);

            $walletTable = new WalletsTable();
            if ( $walletTable.update($fromWallet) && $walletTable.update($toWallet)) {
                $result = array('fromAmount' => $fromAmount, 'toAmount' =>$toAmount );
                return $result;
            }

        } else {
            return false;
        }
    }

    /**
     * Removes a Wallet object as a record from wallets table in moneylover database
     * @param id of a wallet
     * @return id of wallet object removed successfully
     */
    public function removeWallet($_id)
    {
        $walletTable = new WalletsTable();
        if ($walletTable.remove($_id)) {
            return $_id;
        } else {
            return false;
        }
    }
}
