import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StringComparsionComponent } from './string-comparsion.component';

describe('StringComparsionComponent', () => {
  let component: StringComparsionComponent;
  let fixture: ComponentFixture<StringComparsionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ StringComparsionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(StringComparsionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
