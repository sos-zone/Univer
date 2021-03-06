/*
 * File: app/view/MyGridPanel.js
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

Ext.define('UserpanelApp.view.MyGridPanel', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.mygridpanel',

    requires: [
        'UserpanelApp.view.MyGridPanelViewModel',
        'Ext.view.Table',
        'Ext.grid.column.Column',
        'Ext.form.field.Text',
        'Ext.toolbar.Toolbar',
        'Ext.button.Button',
        'Ext.grid.plugin.RowEditing'
    ],

    viewModel: {
        type: 'mygridpanel'
    },
    height: 300,
    width: 500,
    title: 'My Grid Panel',
    store: 'UserStore',
    defaultListenerScope: true,

    columns: [
        {
            xtype: 'gridcolumn',
            width: 75,
            dataIndex: 'user_id',
            text: 'User Id'
        },
        {
            xtype: 'gridcolumn',
            width: 200,
            dataIndex: 'user_name',
            text: 'User Name',
            editor: {
                xtype: 'textfield'
            }
        }
    ],
    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            width: 400,
            items: [
                {
                    xtype: 'button',
                    text: 'load',
                    listeners: {
                        click: 'onButtonClick'
                    }
                },
                {
                    xtype: 'button',
                    text: 'save',
                    listeners: {
                        click: 'onButtonClick1'
                    }
                }
            ]
        }
    ],
    plugins: [
        {
            ptype: 'rowediting'
        }
    ],

    onButtonClick: function(button, e, eOpts) {
        var custStore = Ext.getStore('UserStore');
        if (custStore != null) {
            custStore.load();
            var UserStore = Ext.getStore("UserStore");

            Ext.Msg.alert('Status', "REST Loaded successfully, store: " + UserStore);
            console.log("Load ok"); //logs go where??
        } else {
            Ext.Msg.show({
                title:'Load Failed',
                msg: 'Cannot find UserStore',
                buttons: Ext.Msg.YESNOCANCEL,
                fn: processResult,
                animEl: 'elId'
            });
        }
    },

    onButtonClick1: function(button, e, eOpts) {
        var custStore = Ext.getStore('UserStore');
        custStore.sync();
    }

});