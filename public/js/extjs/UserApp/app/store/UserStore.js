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

Ext.define('UserApp.store.UserStore', {
    extend: 'Ext.data.Store',
    alias: 'store.userStore',

    requires: [
        'UserApp.model.UserModel'
    ],

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            storeId: 'UserStore',
            model: 'UserApp.model.UserModel',
            data: [
                {
                    user_id: '1',
                    user_name: 'Suleiman ibn Hottab',
                    user_educ: ' higher education',
                    city_name: 'Brest'
                },
                {
                    user_id: '2',
                    user_name: 'Viktor Petrovich',
                    user_educ: 'secondary education',
                    city_name: 'Mogilev'
                },
                {
                    user_id: '3',
                    user_name: 'Olga Pavlovna',
                    user_educ: 'basic education',
                    city_name: 'Minsk'
                },
                {
                    user_id: '4',
                    user_name: 'Raisa Petrovna',
                    user_educ: 'secondary special education',
                    city_name: 'Grodno'
                }
            ]
        }, cfg)]);
    }
});