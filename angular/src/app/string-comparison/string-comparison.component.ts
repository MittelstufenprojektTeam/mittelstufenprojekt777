import {Component, Input } from '@angular/core';

@Component({
  selector: 'app-string-comparison',
  templateUrl: './string-comparison.component.html',
  styleUrls: ['./string-comparison.component.css']
})
export class StringComparisonComponent {

  @Input() question: any;
  @Input() answer: string = '';

  submitAnswer() {
    console.log(this.answer)
    console.log(this.question?.answer === this.answer);
  }

  getQuestion(): string|null {
    return this.question.question;
  }
}
