<?php
/**
 * Merge customer.
 * 
 * @param  int    $customerID 
 * @access public
 * @return void
 */
public function merge($customerID)
{
    return $this->loadExtension('bizext')->merge($customerID);
}

public function createFromImport()
{
    return $this->loadExtension('bizext')->createFromImport();
}

public function getInvoiceByID($invoiceID)
{
    return $this->loadExtension('bizext')->getInvoiceByID($invoiceID);
}

public function getInvoiceList($customerID)
{
    return $this->loadExtension('bizext')->getInvoiceList($customerID);
}

public function createInvoice($customerID)
{
    return $this->loadExtension('bizext')->createInvoice($customerID);
}

public function updateInvoice($invoiceID)
{
    return $this->loadExtension('bizext')->updateInvoice($invoiceID);
}

public function deleteInvoice($invoiceID, $table = null)
{
    return $this->loadExtension('bizext')->deleteInvoice($invoiceID, $table);
}
