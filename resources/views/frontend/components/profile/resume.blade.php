@extends('frontend.layouts.app')

@section('main')
    <section class="page-title title-bg11">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Resume</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Resume</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <section class="resume-section ptb-100">
        <div class="container">
            <div class="resume-area">
                @if (!empty($resume))
                    <div class="row">
                        <div class="container text-center mb-4">
                            <h1>Your Resume</h1>
                        </div>

                        <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
                            <canvas id="pdf_area" class="pdf_area" style="max-height: 100%; max-width: 100%; border: 2px solid #007BFF; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"></canvas>
                        </div>

                        <div class="container">
                            <div class="row theme-btn" id="navigation-buttons">
                                <div class="col-md-6">
                                    <button class="default-btn mx-2" id="prev-page" onclick="main.showPrevPage()">Prev</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="default-btn mx-2" id="next-page" onclick="main.showNextPage()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="text-center">
                            <h3>Upload Your Resume On Jovie</h3>
                            <p>and let the right job find you!</p>
                        </div>
                        <div class="theme-btn">
                            <a href="#" class="default-btn" type="button" data-bs-toggle="modal" data-bs-target="#resume_modal">
                                Upload
                                <i class='bx bx-upload bx-fade-up'></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection



@section('customJs')
    @if (!empty($resume))
        <script>
            class Main {
                constructor(url) {
                    this.url = url;
                    this.pdfDoc = null;
                    this.pageNum = 1;
                    this.numPages = 0;
                    this.scale = 1.5;

                    this.init();
                }

                async init() {
                    try {
                        const loadingTask = pdfjsLib.getDocument(this.url);
                        this.pdfDoc = await loadingTask.promise;
                        this.numPages = this.pdfDoc.numPages;
                        this.renderPage(this.pageNum);
                        this.updateNavigation();
                    } catch (error) {
                        console.error('Error loading PDF:', error);
                    }
                }

                async renderPage(num) {
                    const canvas = document.getElementById('pdf_area');
                    const ctx = canvas.getContext('2d');

                    try {
                        const page = await this.pdfDoc.getPage(num);
                        const viewport = page.getViewport({
                            scale: this.scale
                        });
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        const renderContext = {
                            canvasContext: ctx,
                            viewport: viewport
                        };
                        await page.render(renderContext).promise;
                    } catch (error) {
                        console.error('Error rendering page:', error);
                    }
                }

                showPrevPage() {
                    if (this.pageNum <= 1) {
                        return;
                    }
                    this.pageNum--;
                    this.renderPage(this.pageNum);
                    this.updateNavigation();
                }

                showNextPage() {
                    if (this.pageNum >= this.numPages) {
                        return;
                    }
                    this.pageNum++;
                    this.renderPage(this.pageNum);
                    this.updateNavigation();
                }

                updateNavigation() {
                    const prevButton = document.getElementById('prev-page');
                    const nextButton = document.getElementById('next-page');

                    prevButton.style.display = (this.pageNum > 1) ? 'inline-block' : 'none';
                    nextButton.style.display = (this.pageNum < this.numPages) ? 'inline-block' : 'none';
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const pdfUrl = '{{ asset('cvs/' . $resume->resume) }}';
                window.main = new Main(pdfUrl);
            });
        </script>
    @endif
@endsection
