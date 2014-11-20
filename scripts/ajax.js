ajaxRequest = function(u,f,m,b,h,s)
{
    this.url      = u;
    this.wState   = f || function() { };
    this.method   = m || "GET";
    this.body     = b || null;
    this.headers  = h || false;
    this.sync     = s || true;
    this.abortReq = false;

    this.req = (window.XMLHttpRequest)
           ?
           new XMLHttpRequest()
           :
           ((window.ActiveXObject)
           ?
           new ActiveXObject("Microsoft.XMLHTTP")
           :
           false
           );

    this.doRequest = function()
    {
        this.req.open(this.method,this.url,this.sync);
        if (this.headers)
        {
            for (var i=0; i<this.headers.length; i+=2)
            {
                this.req.setRequestHeader(
                    this.headers[i],this.headers[i+1]
                );
            }
        }
        this.req.onreadystatechange = this.wState;
        (!this.abortReq) ? this.req.send(this.body) : this.req.abort();
    }
}