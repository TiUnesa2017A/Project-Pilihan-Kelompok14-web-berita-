/* global Modernizr */
var upload = function () {
    var max = 6;
    var textNew = "Adicionar";
    var textTitle = "Clique ou arraste aqui uma foto";
    var textTitleRemove = "Clique aqui para remover a foto";
    var iconNew = 'fa fa-camera';
    var iconClose = 'fa fa-times';
    var mimes = ["image/jpeg", "image/png"];
    var target;
    var index = 0;
    function remove($this) {
        var $index = $($this).attr("data-index");
        $(target + " #base64_" + $index).val('');
        $(target + " #new_" + $index).removeClass("hidden");
        $(target + " #prev_" + $index).addClass("hidden");
        $(target + " #prev_" + $index).find('img').attr("src", '');
        $($this).find(".uploadArea").removeClass("selected");
        $($this).removeClass("selected");
    }
    function makeHTML($index) {
        var $mimes = mimes.join(',');
        return "<div class=\"box-drag column\" draggable=\"true\"><input type=\"hidden\" name=\"base[]\" id=\"base64_" + $index + "\" data-id=\"" + $index + "\"><div class=\"form-group\"><div class=\"col-md-12 no-padding uploadArea\" data-index=\"" + $index + "\"><span class=\"new\" id=\"new_" + $index + "\" title=\"" + textTitle + "\" data-index=\"" + $index + "\"><input type=\"file\" class=\"fileHidden hidden\" multiple=\"\" accept=\"" + $mimes + "\" id=\"hidden_" + $index + "\" data-index=\"" + $index + "\"><i class=\"" + iconNew + "\"></i><p>" + textNew + "</p></span><span class=\"image-preview hidden\" id=\"prev_" + $index + "\"><div class=\"remove\" title=\"" + textTitleRemove + "\" data-index=\"" + $index + "\"><i class=\"" + iconClose + "\"></i></div><img class=\"img-responsive\" src=\"\"></span></div></div></div>";
    }
    function loadContent(options) {
        target = options.target;
        var $target = $(options.target);
        if (!($target.length > 0)) {
            console.log("Target not found : " + options.target);
            return;
        }
        $target.html('');
        for (index; index < max; index++) {
            $target.append(makeHTML(index));
        }
    }
    function initiateDrag() {
        var dragSrcEl = null;
        var cols = document.querySelectorAll('#columns .column');
        function dragg() {
            $(target + ' .uploadArea').on('dragend', function () {
                $(this).removeClass("selected");
            });
            $(target + ' .uploadArea').on('dragleave', function () {
                $(this).removeClass("selected");
            });
            $(target + ' .uploadArea').on('dragstart', function () {
                $(this).addClass("selected");
            });
            $(target + ' .uploadArea').on('dragover', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass("selected");
            });
            $(target + ' .uploadArea').on('dragenter', function (e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass("selected");
            });
            $(target + ' .uploadArea').on('drop', function (e) {
                $(this).removeClass("selected");
                if (e.originalEvent.dataTransfer)
                    if (e.originalEvent.dataTransfer.files.length) {
                        e.preventDefault();
                        e.stopPropagation();
                        upload(e.originalEvent.dataTransfer.files);
                    }
            });
        }
        function setupReader(file, i) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(target + " #prev_" + i).find('img').attr("src", e.target.result);
                $(target + " #prev_" + i).removeClass("hidden");
                $(target + " #new_" + i).addClass("hidden");
                $(target + " #base64_" + i).val(e.target.result).change();
            };
            reader.readAsDataURL(file);
        }
        function upload(files) {
            var used = 0;
            $.each(files, function (i, file) {
                $.each(mimes, function (k, mime) {
                    if (typeof $(target + ' #base64_' + i).val() !== "undefined" && mime === file.type) {
                        if (!(parseInt($(target + ' #base64_' + i).val().length) > 0))
                            setupReader(file, i);
                        else {
                            var pause = 0;
                            for (var x = (used + 1); x < $(target + ' input[name*="base"]').length; x++)
                                if (!pause && parseInt($(target + ' #base64_' + x).val().length) === 0) {
                                    setupReader(file, x);
                                    used = x;
                                    pause++;
                                }
                        }
                    }
                });
            });
        }
        function removeItem() {
            $(target + " .remove").click(function () {
                remove(this);
            });
            $(target + " .new").click(function () {
                document.getElementById('hidden_' + $(this).attr("data-index")).click();
            });
            $(target + " .fileHidden").change(function () {
                upload(this.files);
            });
            dragg();
        }
        function handleDragOver(e) {
            if (e.preventDefault)
                e.preventDefault();
            $(target + " .column").css("opacity", 1);
            $(this).find(".uploadArea").addClass("selected");
            e.dataTransfer.dropEffect = 'move';
            return false;
        }
        function handleDragEnd(e) {
            [].forEach.call(cols, function (col) {
                col.classList.remove('over');
            });
        }
        function handleDragEnter(e) {
            this.classList.add('over');
            e.preventDefault();
            e.stopPropagation();
        }
        function handleDragLeave(e) {
            this.classList.remove('over');
            $(target + " .uploadArea").removeClass("selected");
        }
        function handleDragStart(e) {
            this.style.opacity = '0.4';  // this / e.target is the source node.
            dragSrcEl = this;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDrop(e) {
            if (e.stopPropagation)
                e.stopPropagation();

            if (dragSrcEl !== null && dragSrcEl !== this) {
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
                $(target + " .uploadArea").removeClass("selected");
                $(target + " .column").css("opacity", 1);
            }
            removeItem();
        }

        [].forEach.call(cols, function (col) {
            col.addEventListener('dragstart', handleDragStart, false);
            col.addEventListener('dragenter', handleDragEnter, false);
            col.addEventListener('dragover', handleDragOver, false);
            col.addEventListener('dragleave', handleDragLeave, false);
            col.addEventListener('drop', handleDrop, false);
            col.addEventListener('dragend', handleDragEnd, false);
        });
        removeItem();
    }
    return {
        init: function (options) {
            if (!Modernizr.draganddrop) {
                console.log("Modernizr not enabled");
                return;
            }
            if (typeof options['max'] !== "undefined")
                max = parseInt(options['max']);

            if (typeof options['textNew'] !== "undefined")
                textNew = options['textNew'];

            if (typeof options['textTitle'] !== "undefined")
                textTitle = options['textTitle'];

            if (typeof options['textTitle'] !== "undefined")
                textTitle = options['textTitle'];

            if (typeof options['mimes'] !== "undefined")
                mimes = options['mimes'];

            if (typeof options['start'] !== "undefined")
                index = options['start'];

            loadContent(options);
            initiateDrag();
        },
        reset: function (target) {
            var $target = $(target);
            if (!($target.length > 0)) {
                console.log("Target not found : " + target);
                return;
            }
            $.each($($target).find(".uploadArea"), function (k, v) {
                remove(this);
            });
        }
    };
}();