import {Component, Input } from '@angular/core';

@Component({
  selector: 'app-string-comparison',
  templateUrl: './string-comparison.component.html',
  styleUrls: ['./string-comparison.component.css']
})
export class StringComparisonComponent {

  submitted: boolean = false;
  isCorrectAnswered: boolean = false;
  @Input() question: any;
  @Input() answer: string = '';

  submitAnswer() {
    this.submitted = true;
    if (this.question?.answer === this.answer) {
      this.isCorrectAnswered = true;
    }
  }

  getQuestion(): string|null {
    return this.question.question;
  }
}
