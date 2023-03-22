Ext.define('IconFont.data.Store', {
  extend: 'Ext.tualo.JsonStore',
  fields: [
   {name: 'id', type: 'string'},
   {name: 'classname', type: 'string'},
   {name: 'shortname', type: 'string'},
   {name: 'source', type: 'string'}
  ],
  autoLoad: true,
  //autoSync: true,
  //remoteFilter: true,
  pageSize: 10000,
  proxy: {
    type: 'ajax',

    api: {
      read: './iconfont/read',
    },
    extraParams: {
    },
    writer: {
      type: 'json',
      writeAllFields: true,
      rootProperty: 'data',
    },
    reader: {
      type: 'json',
      rootProperty: 'data',
      idProperty: 'id'
    },
    listeners: {
      exception: function(proxy, response, operation){
        var o,msg;
        try{
          o = Ext.JSON.decode(response.responseText);
          msg = o.msg;
        }catch(e){
          msg = response.responseText;
        }
        Ext.MessageBox.show({
          title: 'Fehler',
          msg: msg,
          icon: Ext.MessageBox.ERROR,
          buttons: Ext.Msg.OK
        });
      }
    }
  }
});
