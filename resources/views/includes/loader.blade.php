<style>
    #pageloader
    {
        background: rgba( 255, 255, 255, 0.8 );
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999;
    }

    #pageloader img
    {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }
</style>

<div id="pageloader">
    <img src="{{asset('assets/images/loader.gif')}}" alt="processing..." />
</div>
