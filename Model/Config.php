<?php

namespace Training\AdminGridLogs\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_TRACK_CUSTOMERS = 'AdminGridLogs/tracking/track_customers';
    const XML_PATH_TRACK_STORES = 'AdminGridLogs/tracking/track_stores';
    const XML_PATH_TRACK_PRODUCTS = 'AdminGridLogs/tracking/track_products';
    const XML_PATH_TRACK_CATEGORIES = 'AdminGridLogs/tracking/track_categories';
    const XML_PATH_TRACK_CONFIG = 'AdminGridLogs/tracking/track_config';
    const XML_PATH_TRACK_ORDERS = 'AdminGridLogs/tracking/track_orders';
    const XML_PATH_TRACK_USERS = 'AdminGridLogs/tracking/track_users';
    const XML_PATH_TRACK_STOCK = 'AdminGridLogs/tracking/track_stock';
    // Add more constant paths for other modules

    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isTrackingCustomersEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_CUSTOMERS);
    }

    public function isTrackingStoresEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_STORES);
    }
    public function isTrackingProductsEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_PRODUCTS);
    }
    public function isTrackingCategoriesEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_CATEGORIES);
    }
    public function isTrackingConfigEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_CONFIG);
    }
    public function isTrackingOrdersEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_ORDERS);
    }
    public function isTrackingUsersEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_USERS);
    }
    public function isTrackingStockEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::XML_PATH_TRACK_STOCK);
    }

    // Add more methods for other modules
}
