/*
 * File: app/controller/usercontroller.js
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

Ext.define('userpanel.controller.usercontroller', {
    extend: 'Ext.app.Controller',

    refs: {
        userdataview: 'userpanel userdataview',
        userformpanel: 'userformwindow userform',
        userformwindow: 'userformwindow',
        userpanel: 'userpanel'
    },

    control: {
        "userpanel button[action='sortbyid']": {
            click: 'onsortbuttonclick'
        },
        "userpanel userdataview": {
            itemclick: 'onDataviewItemClick'
        }
    },

    onsortbuttonclick: function(button, e, eOpts) {
        this.getuserdataview().getStore().sort('user_id','DESC');
    },

    onDataviewItemClick: function(dataview, record, item, index, e, eOpts) {
        /*var win=this.getuserformwindow();*/
        var win=Ext.create('userpanel.view.userformwindow');
        win.show();
        this.getuserform().loadRecord(record);
    }

});
