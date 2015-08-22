/*
 * File: app/store/UserStore.js
 *
 * This file was generated by Sencha Architect version 3.2.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 5.1.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 5.1.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('MyApp.store.UserStore', {
    extend: 'Ext.data.Store',

    requires: [
        'MyApp.model.UserModel',
        'Ext.data.proxy.Ajax',
        'Ext.data.reader.Json'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'UserStore',
            autoLoad: true,
            model: 'MyApp.model.UserModel',
            proxy: {
                type: 'ajax',
                url: '1.json',
                reader: {
                    type: 'json'
                }
            }
        }, cfg)]);
    }
});
