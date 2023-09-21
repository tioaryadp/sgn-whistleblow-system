class Main{
    url = 'assets/kebijakan_wbs.pdf';
    static pdfDoc = null;
    static pageNum = 1;
    static numPages = 0;

    constructor(){
        this.getData(Main.pageNum);
    }

    getData(pageNum){
        pdfjsLib.getDocument(this.url)
            .promise.then(res => {
                console.log(res);
                Main.pdfDoc = res;
                Main.numPages = Main.pdfDoc.numPages;
                Main.renderPage(pageNum);
            });
    }

    static renderPage(num){
        let canvas = document.querySelector("#pdfArea");
        let ctx = canvas.getContext('2d');
        let scale = 1.5;

        Main.pdfDoc.getPage(num).then(pageResponse => {
            const viewport = pageResponse.getViewport({scale});
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderCtx = {
                canvasContext: ctx,
                viewport
            }

            pageResponse.render(renderCtx);
        })
    }

    static showNextPage(){
        if (Main.pageNum >= Main.numPages){
            return;
        }
        Main.pageNum++;
        Main.renderPage(Main.pageNum);
        window.scroll({
            top: 200,
            left: 0,
            behavior: 'smooth'
        });
    }

    static showPrevPage(){
        if (Main.pageNum <= 1){
            return;
        }
        Main.pageNum--;
        Main.renderPage(Main.pageNum);
        window.scroll({
            top: 200,
            left: 0,
            behavior: 'smooth'
        });
    }
}