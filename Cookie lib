// -------------------------
// JavaScript的Cookies函式庫
// -------------------------
// 儲存Cookie
function saveCookie(name, value, expires, path, domain, secure){
  var strCookie = name + "=" + value;
  if (expires){
     // 計算Cookie的期限, 參數為天數
     var curTime = new Date();
     curTime.setTime(curTime.getTime() + expires*24*60*60*1000);
     strCookie += "; expires=" + curTime.toGMTString();
  }
  // Cookie的路徑
  strCookie +=  (path) ? "; path=" + path : ""; 
  // Cookie的Domain
  strCookie +=  (domain) ? "; domain=" + domain : "";
  // 是否需要保密傳送,為一個布林值
  strCookie +=  (secure) ? "; secure" : "";
  document.cookie = strCookie;
}
// 使用名稱參數取得Cookie值, null表示Cookie不存在
function getCookie(name){
  var strCookies = document.cookie;
  var cookieName = name + "=";  // Cookie名稱
  var valueBegin, valueEnd, value;
  // 尋找是否有此Cookie名稱
  valueBegin = strCookies.indexOf(cookieName);
  if (valueBegin == -1) return null;  // 沒有此Cookie
  // 取得值的結尾位置
  valueEnd = strCookies.indexOf(";", valueBegin);
  if (valueEnd == -1)
      valueEnd = strCookies.length;  // 最後一個Cookie
  // 取得Cookie值
  value = strCookies.substring(valueBegin+cookieName.length,valueEnd);
  return value;
}
// 檢查Cookie是否存在
function checkCookieExist(name){
  if (getCookie(name))
      return true;
  else
      return false;
}
// 刪除Cookie
function deleteCookie(name, path, domain){
  var strCookie;
  // 檢查Cookie是否存在
  if (checkCookieExist(name)){
    // 設定Cookie的期限為己過期
    strCookie = name + "="; 
    strCookie += (path) ? "; path=" + path : "";
    strCookie += (domain) ? "; domain=" + domain : "";
    strCookie += "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    document.cookie = strCookie;
  }
}
