<?php
/**
 * Contract model.
 */
class model_contract {
    var $id;
    var $date;
    var $final_price;

    /**
     * Loads a contract by ID.
     */
    public static function load_by_id($id) {
        $db = model_database::instance();
        $sql = 'SELECT *
			FROM contract
			WHERE contract_id = ' . intval($id);
        if ($result = $db->get_row($sql)) {
            $contract = new model_contract;
            $contract->id = $result['contract_id'];
            $contract->date = $result['contract_date'];
            $contract->final_price = $result['contract_finalprice'];
            return $contract;
        }
        return FALSE;
    }

}
